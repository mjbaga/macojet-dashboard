<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoarderRequest extends FormRequest
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
            'nickname' => 'string|max:255|nullable',
            'email' => 'email|nullable',
            'contact_number' => 'string|max:255|nullable',
            'fb_account_name' => 'string|max:255|nullable',
            'date_of_birth' => 'required|date',
            'provincial_address' => 'required',
            'name_of_father' => 'required_without_all:name_of_mother,name_of_guardian|string|max:255|nullable',
            'father_contact' => 'required_with:name_of_father|string|max:255|nullable',
            'name_of_mother' => 'required_without_all:name_of_father,name_of_guardian|string|max:255|nullable',
            'mother_contact' => 'required_with:name_of_mother|string|max:255|nullable',
            'name_of_guardian' => 'required_without_all:name_of_father,name_of_mother|string|max:255|nullable',
            'guardian_contact' => 'required_with:name_of_guardian|string|max:255|nullable',
            // 'profile_type' => 'required|string|max:255',
            'profileable_type' => 'string|max:255|nullable',
            'profileable_id' => 'integer|nullable',
            'profile_picture' => 'image|mimes:jpg,jpeg,png|max:2048|nullable',
            'gender' => 'required|string|max:255'
        ];
    }
}
