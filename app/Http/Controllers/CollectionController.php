<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::latest()->paginate(10);
        return view('admin.collections.index', compact('collections'));
    }

    public function create()
    {
        // جلب جميع المنتجات باش نقدر نختارهم فالـ select
        $products = \App\Models\Product::all();

        return view('admin.collections.create', compact('products'));
    }

    public function show(Collection $collection)
    {
        // Eager load products to avoid N+1 query
        $collection->load('products');

        return view('admin.collections.show', compact('collection'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:25600',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'is_active' => 'sometimes|accepted',
        ]);

        try {
            $collection = DB::transaction(function () use ($request) {
                // Upload image to S3
                $imagePath = $request->file('image')->store('collections/images', 's3');

                // Create collection
                $collection = Collection::create([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title) . '-' . uniqid(),
                    'description' => $request->description,
                    'image' => $imagePath,
                    'is_active' => $request->has('is_active') ? 1 : 0,
                ]);

                // Attach products to collection
                if (!empty($request->products)) {
                    $collection->products()->sync($request->products);
                }

                return $collection;
            });

            return redirect()
                ->route('admin.collections.index')
                ->with('success', 'Collection created successfully');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Failed to create collection: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Collection $collection)
    {
        $products = Product::where('is_active', 1)->get();
        $collection->load('products');

        return view('admin.collections.edit', compact('collection', 'products'));
    }

    public function update(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:25600',
            'is_active' => 'sometimes|boolean',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
        ]);

        try {
            DB::transaction(function () use ($request, $collection) {
                // Update image on S3 if provided
                if ($request->hasFile('image')) {
                    if ($collection->image) {
                        Storage::disk('s3')->delete($collection->image);
                    }
                    $imagePath = $request->file('image')->store('collections/images', 's3');
                } else {
                    $imagePath = $collection->image;
                }

                // Update collection
                $collection->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title) . '-' . uniqid(),
                    'description' => $request->description,
                    'image' => $imagePath,
                    'is_active' => $request->has('is_active') ? 1 : 0,
                ]);

                // Sync products with collection
                if ($request->filled('products')) {
                    $collection->products()->sync($request->products);
                } else {
                    $collection->products()->detach();
                }
            });

            return redirect()
                ->route('admin.collections.index')
                ->with('success', 'Collection updated successfully');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Failed to update collection: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Collection $collection)
    {
        if ($collection->image) {
            Storage::disk('s3')->delete($collection->image);
        }

        $collection->delete(); // soft delete

        return back()->with('success', 'Collection deleted successfully');
    }

    public function toggleStatus(Collection $collection)
    {
        $collection->update([
            'is_active' => !$collection->is_active
        ]);

        return back()->with('success', 'Collection status updated');
    }
}
