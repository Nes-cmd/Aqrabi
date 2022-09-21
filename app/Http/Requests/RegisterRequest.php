<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:9', 'unique:users,phone'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'password_confirmation' => ['required'],
            'dial_code' => ['required', 'string'],
            'user_type' => 'required',
            'tin_number' => ['nullable', 'min:3'],
            'document' => ['nullable', 'file'],
        ];
    }
}
