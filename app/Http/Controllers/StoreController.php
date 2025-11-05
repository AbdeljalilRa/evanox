<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}
