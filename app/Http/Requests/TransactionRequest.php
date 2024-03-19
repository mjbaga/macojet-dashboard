<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'transaction_type' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'date_of_payment' => 'required|date',
            'transactable_type' => 'string|max:255|nullable',
            'transactable_id' => 'integer|nullable',
            'payment_proof' => 'image|mimes:jpg,jpeg,png|max:2048|nullable',
        ];
    }
}
