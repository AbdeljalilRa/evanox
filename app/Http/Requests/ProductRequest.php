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
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'boolean',
            'file_path' => 'nullable|image|max:300000', // 30MB max
            'images.*' => 'nullable|image|max:5000',
        ];

        if ($this->isMethod('post')) {
            $rules['file_path'] = 'nullable|image|max:300000';
        }

        return $rules;
    }
}