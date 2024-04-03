<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest
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
            'type' => ['required', 'string'],
            'content' => ['required', 'string'],
            'noteable_type' => ['required', 'string'],
            'noteable_id' => ['required', 'integer'],
            'reminder_alarm' => ['nullable', 'date'],
            'resolved' => ['boolean']
        ];
    }
}
