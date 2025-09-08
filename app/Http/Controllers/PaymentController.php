<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\StripePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Exception;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Show the checkout page
     */
    public function checkout()
    {
        return view('store.checkout');
    }

    /**
     * Create payment intent for Stripe
     */
    public function createPaymentIntent(Request $request)
    {
        try {
            $request->validate([
                'items' => 'required|array',
                'items.*.id' => 'required|string',
                'items.*.product_id' => 'nullable|string',
                'items.*.name' => 'required|string',
                'items.*.price' => 'required|string',
                'items.*.quantity' => 'required|integer|min:1',
                'items.*.image' => 'nullable|string',
            ]);

            $cartItems = $request->input('items');
            $total = 0;

            // Calculate total from cart items
            foreach ($cartItems as $item) {
                $priceValue = (float) preg_replace('/[^0-9.]/', '', $item['price']);
                $total += $priceValue * $item['quantity'];
            }

            // Convert to cents for Stripe
            $amountInCents = (int) ($total * 100);

            // Create PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $amountInCents,
                'currency' => 'usd',
                'metadata' => [
                    'user_id' => Auth::id(),
                    'item_count' => count($cartItems),
                ],
            ]);

            return response()->json([
                'client_secret' => $paymentIntent->client_secret,
                'amount' => $total,
                'currency' => 'usd',
            ]);

        } catch (Exception $e) {
            Log::error('Payment Intent Creation Failed: ' . $e->getMessage());
            return response()->json([
                'error' => 'Failed to create payment intent'
            ], 500);
        }
    }

    /**
     * Process the payment after successful Stripe payment
     */
    public function processPayment(Request $request)
    {
        try {
            $request->validate([
                'payment_intent_id' => 'required|string',
                'items' => 'required|array',
                'items.*.id' => 'required|string',
                'items.*.product_id' => 'nullable|string',
                'items.*.name' => 'required|string',
                'items.*.price' => 'required|string',
                'items.*.quantity' => 'required|integer|min:1',
                'items.*.image' => 'nullable|string',
            ]);

            DB::beginTransaction();

            // Retrieve the PaymentIntent from Stripe
            $paymentIntent = PaymentIntent::retrieve($request->payment_intent_id);

            if ($paymentIntent->status !== 'succeeded') {
                throw new Exception('Payment was not successful');
            }

            $cartItems = $request->input('items');
            $total = 0;

            // Calculate total and validate products
            $orderItems = [];
            foreach ($cartItems as $item) {
                $priceValue = (float) preg_replace('/[^0-9.]/', '', $item['price']);
                $itemTotal = $priceValue * $item['quantity'];
                $total += $itemTotal;

                $orderItems[] = [
                    'product_id' => $item['product_id'] ?? null,
                    'name' => $item['name'],
                    'price' => $priceValue,
                    'quantity' => $item['quantity'],
                    'subtotal' => $itemTotal,
                ];
            }

            // Create Order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'order_status' => 'pending',
                'payment_status' => 'paid',
                'payment_method' => 'stripe',
            ]);

            // Create Order Items
            foreach ($orderItems as $item) {
                $productId = $item['product_id'];
                
                // If no product_id, try to find the product by name or create a fallback
                if (!$productId) {
                    // Try to find product by name (for items added before this update)
                    $product = Product::where('title', 'LIKE', '%' . $item['name'] . '%')->first();
                    if ($product) {
                        $productId = $product->id;
                    } else {
                        // Skip this item if we can't find a matching product
                        Log::warning('Could not find product for order item: ' . $item['name']);
                        continue;
                    }
                }
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Create Stripe Payment Record
            StripePayment::create([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'stripe_payment_id' => $paymentIntent->id,
                'stripe_intent_id' => $paymentIntent->id,
                'amount' => $total,
                'currency' => 'usd',
                'status' => 'succeeded',
                'response' => $paymentIntent->toArray(),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'message' => 'Payment processed successfully',
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Payment Processing Failed: ' . $e->getMessage());
            return response()->json([
                'error' => 'Payment processing failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle payment success
     */
    public function paymentSuccess(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = null;

        if ($orderId) {
            $order = Order::with(['orderItems', 'stripePayments'])
                          ->where('user_id', Auth::id())
                          ->find($orderId);
        }

        return view('store.payment-success', compact('order'));
    }

    /**
     * Handle payment cancellation
     */
    public function paymentCancel()
    {
        return view('store.payment-cancel');
    }
}
