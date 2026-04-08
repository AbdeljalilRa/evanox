<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Store a newly created order with order items
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            // Use database transaction to ensure data consistency
            DB::beginTransaction();

            // Get authenticated user
            $user = Auth::user();
            if (!$user) {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }

            // Validate and fetch all products at once to check existence
            $productIds = collect($request->validated()['items'])->pluck('product_id')->unique()->toArray();
            
            // Check if all products exist (excluding soft-deleted products)
            $existingProducts = Product::whereIn('id', $productIds)->get();
            
            if ($existingProducts->count() !== count(array_unique($productIds))) {
                DB::rollBack();
                $missingIds = array_diff($productIds, $existingProducts->pluck('id')->toArray());
                return response()->json([
                    'error' => 'One or more products do not exist or have been deleted.',
                    'missing_product_ids' => $missingIds
                ], 422);
            }

            // Calculate total price
            $total = 0;
            $itemsData = [];
            
            foreach ($request->validated()['items'] as $item) {
                $product = $existingProducts->find($item['product_id']);
                
                if (!$product) {
                    DB::rollBack();
                    return response()->json([
                        'error' => "Product ID {$item['product_id']} not found."
                    ], 422);
                }

                // Store product price at time of order (prevents price changing issues)
                $itemPrice = $product->price;
                $itemTotal = $itemPrice * $item['quantity'];
                $total += $itemTotal;

                $itemsData[] = [
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $itemPrice,
                ];
            }

            // Create the order
            $order = Order::create([
                'user_id' => $user->id,
                'total' => $total,
                'order_status' => 'pending',
                'payment_status' => 'unpaid',
                'payment_method' => $request->input('payment_method', 'stripe'),
            ]);

            // Create order items
            foreach ($itemsData as $itemData) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $itemData['product_id'],
                    'quantity' => $itemData['quantity'],
                    'price' => $itemData['price'],
                ]);
            }

            // Commit transaction
            DB::commit();

            return response()->json([
                'message' => 'Order created successfully',
                'order_id' => $order->id,
                'total' => $order->total,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'error' => 'Failed to create order',
                'message' => config('app.debug') ? $e->getMessage() : 'An error occurred while processing your order.',
            ], 500);
        }
    }

    public function index(Request $request)
    {
        $query = Order::with('user')->latest();

        // Search by order ID, user name, or email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                                  ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by order status
        if ($request->filled('order_status')) {
            $query->where('order_status', $request->order_status);
        }

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        $orders = $query->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete(); // soft delete

        return back()->with('success', 'Order deleted successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $field = $request->input('field');
        $value = $request->input('value');

        if (!in_array($field, ['order_status', 'payment_status'])) {
            return response()->json(['message' => 'Invalid field'], 400);
        }

        $order->$field = $value;
        $order->save();

        return response()->json(['message' => ucfirst(str_replace('_', ' ', $field)) . ' updated successfully']);
    }

}
