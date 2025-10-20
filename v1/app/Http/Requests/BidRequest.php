<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidRequest extends FormRequest
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
            'buyer_name' => ['required', 'string', 'max:255'],
            //'tender_id' => ['required', 'exists:tenders,id'],
            'category_id' => ['required', 'exists:categories,id'],
            // 'amount' => ['required', 'numeric', 'min:0'],
            'delivery_location' => ['required', 'string', 'max:255'],
            'delivery_date' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'document' => ['nullable', 'array'],
            'quantity' => ['required', 'integer', 'min:1'],
            'unit_price' => ['required', 'integer', 'min:0'],
            'status' => ['in:Under Review,Accepted,Rejected'],
        ];
    }

    // public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    // {
    //     dd($validator->errors()->toArray());
    // }
}
