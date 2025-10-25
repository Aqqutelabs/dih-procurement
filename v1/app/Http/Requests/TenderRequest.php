<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenderRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'grade' => ['nullable', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'min:1'],
            'unit' => ['required', 'string', 'max:255'],
            'value' => ['nullable', 'integer', 'min:0'],
            'commodity_type' => ['nullable', 'string', 'max:255'],
            'currency' => ['required', 'string', 'max:10'],
            'quality_standard' => ['nullable', 'array'], // JSON
            'delivery_location' => ['nullable', 'string', 'max:255'],
            'delivery_start_date' => ['required', 'date'],
            'delivery_end_date' => ['required', 'date', 'after_or_equal:delivery_start_date'],
            'publish_date' => ['nullable', 'date'],
            'opening_date' => ['nullable', 'date'],
            'closing_date' => ['nullable', 'date', 'after_or_equal:opening_date'],
            'bid_deadline' => ['nullable', 'date'],
            'timezone' => ['nullable', 'string', 'max:100'],
            'document' => ['nullable', 'array'], // JSON
            'cross_border_tender' => ['boolean'],
        ];
    }

    // Custom messages
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required',
            'quantity.required' => 'Please provide the quantity',
            'unit.required' => 'Please provide the unit',
            'currency.required' => 'Currency is required',
            'delivery_start_date.required' => 'The delivery start date is required',
            'delivery_end_date.required' => 'The delivery end date is required',
            'delivery_end_date.after_or_equal' => 'The delivery end date must be after or equal to the start date',
            'closing_date.after_or_equal' => 'The closing date must be after or equal to the opening date',
        ];
    }

    // public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    // {
    //     dd($validator->errors()->toArray());
    // }
}
