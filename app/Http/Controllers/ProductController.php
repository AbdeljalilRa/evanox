<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


     public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'file_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Generate slug
        $slug = Str::slug($request->title);

        // Main Image Upload
        $mainImagePath = null;
        if ($request->hasFile('file_path')) {
            $mainImagePath = $request->file('file_path')->store('products/main', 's3');
        }

        // Create product
        $product = Product::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage ?? 0,
            'stock' => $request->stock,
            'file_path' => $mainImagePath,
            'is_active' => $request->has('is_active'),
            'category_id' => $request->category_id,
        ]);

        // Gallery Images Upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $galleryPath = $image->store('products/gallery', 's3');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $galleryPath,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'file_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage ?? 0,
            'stock' => $request->stock,
            'is_active' => $request->has('is_active'),
            'category_id' => $request->category_id,
        ]);

        // Replace main image if uploaded
        if ($request->hasFile('file_path')) {
            if ($product->file_path) {
                Storage::disk('s3')->delete($product->file_path);
            }
            $product->file_path = $request->file('file_path')->store('products/main', 's3');
            $product->save();
        }

        // Add new gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $galleryPath = $image->store('products/gallery', 's3');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $galleryPath,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete(); // Soft delete
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function toggleStatus(Product $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        return back()->with('success', 'Product status updated successfully.');
    }

   
}
