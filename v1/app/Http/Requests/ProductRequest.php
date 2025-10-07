<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'packaging_type' => ['nullable', 'string', 'max:255'],
            'lead_time' => ['required', 'integer', 'min:1'],
            'unit_price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1'],
            'delivery_mode' => ['nullable', 'string', 'max:255'],
            'document' => ['nullable', 'array'], // JSON
            'document' => ['nullable', 'file', 'mimes:pdf,doc,docx,png,jpg,jpeg'],
            'supply_region' => ['nullable', 'string', 'max:255'],
            'accept_terms' => ['boolean'],
        ];
    }

     // Custom messages
    public function messages(): array
    {
        return [
            'name.required' => 'The name is required',
            'category.required' => 'Please select a category',
            'quantity.required' => 'Please provide the quantity',
            'unit_price.required' => 'Please provide the unit price',
        ];
    }
}
