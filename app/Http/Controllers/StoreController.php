<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Coupon;

class StoreController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with(['products.images'])
            ->whereHas('products', function ($q) {
                $q->where('is_active', 1);
            })
            ->get();

        $products = \App\Models\Product::with('images')
            ->where('is_active', 1)
            ->latest()
            ->take(20)
            ->get();

        return view('store.index', compact('categories', 'products'));
    }

    public function show($slug)
    {
        // جيب المنتج عبر الـ slug
        $product = Product::with('images')->where('slug', $slug)->firstOrFail();

        // Related products (ممكن تبدل حسب المنطق ديالك)
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('store.show', compact('product', 'relatedProducts'));
    }

    public function showCollection($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $products = Product::with('images')
            ->where('category_id', $category->id)
            ->where('is_active', 1)
            ->latest()
            ->paginate(12);

        return view('store.collection', compact('category', 'products'));
    }

    public function newsletterCoupon(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Check if already has coupon
        $existing = Coupon::where('email', $request->email)->first();
        if ($existing) {
            return response()->json([
                'success' => true,
                'message' => 'Coupon already created.',
                'code' => $existing->code
            ]);
        }

        // Create unique coupon code
        $code = 'WELCOME20-' . strtoupper(Str::random(6));

        $coupon = Coupon::create([
            'code' => $code,
            'type' => 'percent',
            'value' => 20,
            'usage_limit' => 1,
            'used_count' => 0,
            'min_order_amount' => null,
            'starts_at' => now(),
            'expires_at' => now()->addDays(7),
            'is_active' => true,
            'email' => $request->email,
            'slug' => Str::slug($code)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Coupon created successfully',
            'code' => $coupon->code
        ]);
    }
}
