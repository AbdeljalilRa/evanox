<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Filesystem\FilesystemAdapter;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'images'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation
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

        // Upload gallery images to local storage
        foreach (['images_1', 'images_2', 'images_3', 'images_4'] as $imgField) {
            if ($request->hasFile($imgField)) {
                // Store image in local storage
                $path = $request->file($imgField)->store('products/gallery', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        // AJAX response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('admin.products.index')
            ]);
        }

        // Fallback redirect
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
        $product->append(['image_url', 'gallery_urls']);
        $productImages = $product->images;
        return view('admin.products.edit', compact('product', 'categories', 'productImages'));
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
            'images_1' => 'nullable|image|max:20480',
            'images_2' => 'nullable|image|max:20480',
            'images_3' => 'nullable|image|max:20480',
            'images_4' => 'nullable|image|max:20480',
            'is_active' => 'sometimes|boolean',
        ]);

        $product = Product::findOrFail($id);

        // Update main file if uploaded (stays on S3)
        if ($request->hasFile('file_path')) {
            // Delete old file from S3 if exists
            if ($product->file_path) {
                Storage::disk('s3')->delete($product->file_path);
            }
            $product->file_path = $request->file('file_path')->store('products/files', 's3');
        }

        // Update basic fields
        $product->title = $request->title;
        $product->slug = Str::slug($request->title) . '-' . uniqid();
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_percentage = $request->discount_percentage ?? 0;
        $product->stock = $request->stock;
        $product->is_active = $request->has('is_active') ? 1 : 0;
        $product->category_id = $request->category_id;
        $product->save();

        // Update/Add gallery images in local storage
        $galleryFields = ['images_1', 'images_2', 'images_3', 'images_4'];
        $productImages = $product->images()->orderBy('id')->get();

        foreach ($galleryFields as $index => $imgField) {
            if ($request->hasFile($imgField)) {
                // Store new image in local storage
                $path = $request->file($imgField)->store('products/gallery', 'public');
                
                // Update existing image or create new one
                if (isset($productImages[$index])) {
                    // Delete old image from local storage if exists
                    if ($productImages[$index]->image_path) {
                        Storage::disk('public')->delete($productImages[$index]->image_path);
                    }
                    $productImages[$index]->image_path = $path;
                    $productImages[$index]->save();
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
        // Delete images from local storage before deleting product
        foreach ($product->images as $image) {
            if ($image->image_path) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        // Delete main file from S3 if exists
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