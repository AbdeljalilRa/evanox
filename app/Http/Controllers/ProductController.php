<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'images']);

        // 🔍 Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // 🗂 Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query
            ->orderByDesc('created_at')
            ->paginate(10)
            ->appends($request->query()); // مهم مع pagination

        $categories = Category::orderBy('title')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'discount_percentage' => 'nullable|numeric',
            'file_path' => 'nullable|file',
            'images_1' => 'nullable|image|max:25600',
            'images_2' => 'nullable|image|max:25600',
            'images_3' => 'nullable|image|max:25600',
            'images_4' => 'nullable|image|max:25600',
            'is_active' => 'sometimes|boolean',
        ]);

        // Upload main file to S3
        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('products/files', 's3');
        }

        // Create product
        $product = Product::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'description' => $request->description,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage ?? 0,
            'stock' => $request->stock,
            'file_path' => $filePath,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'category_id' => $request->category_id,
        ]);

        // Upload gallery images directly to S3
        foreach (['images_1', 'images_2', 'images_3', 'images_4'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $path = $request->file($imgField)->store('products/gallery', 's3');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('images');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'discount_percentage' => 'nullable|numeric',
            'file_path' => 'nullable|file',
            'images_1' => 'nullable|image|max:25600',
            'images_2' => 'nullable|image|max:25600',
            'images_3' => 'nullable|image|max:25600',
            'images_4' => 'nullable|image|max:25600',
            'is_active' => 'sometimes|boolean',
        ]);

        $product = Product::findOrFail($id);

        // Update main file on S3
        if ($request->hasFile('file_path')) {
            if ($product->file_path) {
                Storage::disk('s3')->delete($product->file_path);
            }
            $product->file_path = $request->file('file_path')->store('products/files', 's3');
        }

        // Update basic fields
        $product->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'description' => $request->description,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage ?? 0,
            'stock' => $request->stock,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'category_id' => $request->category_id,
        ]);

        // Update/Add gallery images on S3
        $galleryFields = ['images_1', 'images_2', 'images_3', 'images_4'];
        $productImages = $product->images()->orderBy('id')->get();

        foreach ($galleryFields as $index => $imgField) {
            if ($request->hasFile($imgField)) {
                $path = $request->file($imgField)->store('products/gallery', 's3');

                if (isset($productImages[$index])) {
                    if ($productImages[$index]->image_path) {
                        Storage::disk('s3')->delete($productImages[$index]->image_path);
                    }
                    $productImages[$index]->update(['image_path' => $path]);
                } else {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete all images from S3
        foreach ($product->images as $image) {
            if ($image->image_path) {
                Storage::disk('s3')->delete($image->image_path);
            }
        }

        // Delete main file from S3
        if ($product->file_path) {
            Storage::disk('s3')->delete($product->file_path);
        }

        $product->delete(); // Soft delete
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function toggleStatus(Product $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        return back()->with('success', 'Product status updated successfully.');
    }
}
