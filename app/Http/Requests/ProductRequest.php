<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

public function rules()
{
    return [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'discount_percentage' => 'nullable|numeric|min:0|max:100',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'is_active' => 'boolean',
        'file_path' => 'nullable|image|max:10240', // 10MB max
        'images.*' => 'nullable|image|max:5120', // 5MB max per image
    ];
}

public function messages()
{
    return [
        'file_path.max' => 'The main image must not be larger than 10MB.',
        'images.*.max' => 'Each gallery image must not be larger than 5MB.',
        'images.*.image' => 'All gallery files must be images.',
    ];
}
}