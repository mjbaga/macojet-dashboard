<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaseAgreementRequest extends FormRequest
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
            'unit_id' => 'required|integer',
            'room_id' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'agreed_payment' => 'required|numeric',
            'terms_of_payment' => 'required|string',
            'contract_doc' => 'mimes:pdf,doc,docx|nullable',
            'months_deposit' => 'required|integer',
            'deposit_amount' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'unit_id.integer' => 'Please select a unit.',
            'room_id.integer' => 'Please select a room.',
        ];
    }
}
