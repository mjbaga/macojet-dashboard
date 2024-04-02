<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransientRequest extends FormRequest
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
            'first_name' => 'required|string|max:255', 
            'last_name' => 'required|string|max:255',
            'contact_number' => 'string|max:255|nullable',
            'fb_account_name' => 'string|max:255|nullable',
            'date_of_birth' => 'required|date',
            'origin_address' => 'required',
            'identification' => 'image|mimes:jpg,jpeg,png|max:2048|nullable',
            'gender' => 'required|string|max:255'
        ];
    }
}
