<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::random(5) . '.' . $request->image->extension();
            $request->image->storeAs('categories/gallery', $imageName, 'public');
        }

        Category::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'nullable|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
        ]);

        $imageName = $category->image;

        if ($request->hasFile('image')) {

            // Delete old image from storage
            if ($category->image && Storage::disk('public')->exists('categories/gallery/' . $category->image)) {
                Storage::disk('public')->delete('categories/gallery/' . $category->image);
            }

            // Save new image
            $imageName = time() . '_' . Str::random(5) . '.' . $request->image->extension();
            $request->image->storeAs('categories/gallery', $imageName, 'public');
        }

        $category->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
