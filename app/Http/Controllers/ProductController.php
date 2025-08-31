<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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

 public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $data = $request->validated();
            $data['slug'] = Str::slug($data['title']);
            
            // Handle main product image
            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $filename = time() . '_' . Str::slug($file->getClientOriginalName());
                
                // Store file with public visibility
                $path = Storage::disk('s3')->putFileAs(
                    'products',
                    $file,
                    $filename,
                    ['visibility' => 'public']
                );
                
                $data['file_path'] = $this->getS3Url($path);
            }

            $product = Product::create($data);

            // Handle multiple product images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = time() . '_' . Str::slug($image->getClientOriginalName());
                    
                    $path = Storage::disk('s3')->putFileAs(
                        'products/gallery',
                        $image,
                        $filename,
                        ['visibility' => 'public']
                    );
                    
                    $product->images()->create([
                        'image_path' => $this->getS3Url($path)
                    ]);
                }
            }

            DB::commit();
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product created successfully.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product creation error: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Error creating product: ' . $e->getMessage());
        }
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

     public function update(ProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();
            
            $data = $request->validated();
            
            if ($request->hasFile('file_path')) {
                // Delete old image
                if ($product->file_path) {
                    $oldPath = $this->getPathFromUrl($product->file_path);
                    Storage::disk('s3')->delete($oldPath);
                }
                
                $file = $request->file('file_path');
                $filename = time() . '_' . Str::slug($file->getClientOriginalName());
                
                $path = Storage::disk('s3')->putFileAs(
                    'products',
                    $file,
                    $filename,
                    ['visibility' => 'public']
                );
                
                $data['file_path'] = $this->getS3Url($path);
            }

            // Handle multiple product images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = time() . '_' . Str::slug($image->getClientOriginalName());
                    
                    $path = Storage::disk('s3')->putFileAs(
                        'products/gallery',
                        $image,
                        $filename,
                        ['visibility' => 'public']
                    );
                    
                    $product->images()->create([
                        'image_path' => $this->getS3Url($path)
                    ]);
                }
            }

            $product->update($data);
            
            DB::commit();
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product updated successfully.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product update error: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Error updating product: ' . $e->getMessage());
        }
    }


    public function destroy(Product $product)
    {
        try {
            // Delete main image from S3
            if ($product->file_path) {
                $path = $this->getPathFromUrl($product->file_path);
                Storage::disk('s3')->delete($path);
            }

            // Delete gallery images from S3
            foreach ($product->images as $image) {
                $path = $this->getPathFromUrl($image->image_path);
                Storage::disk('s3')->delete($path);
            }

            $product->delete();

            return redirect()->route('admin.products.index')
                ->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }

    public function toggleStatus(Product $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        return back()->with('success', 'Product status updated successfully.');
    }

    private function getS3Url($path)
    {
        return config('filesystems.disks.s3.url') . '/' . $path;
    }

    private function getPathFromUrl($url)
    {
        $baseUrl = rtrim(config('filesystems.disks.s3.url'), '/') . '/';
        return str_replace($baseUrl, '', $url);
    }
}