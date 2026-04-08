<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'integer', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * Custom error messages
     */
    public function messages(): array
    {
        return [
            'items.required' => 'Order must contain at least one item.',
            'items.*.product_id.exists' => 'Product with ID :input does not exist or has been deleted.',
            'items.*.quantity.min' => 'Quantity must be at least 1.',
        ];
    }
}
