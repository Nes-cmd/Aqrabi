<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required|string|max:60',
            'phone' => 'required|max:14|string',
            'email' => 'required|string|max:60',
            'country_id' => 'required|integer',
            'postal_code' => 'required|string',
            'posta_number' => 'required',
            'city_name' => 'required|string',
            'addressLine1' => 'required|string'
        ];
    }
}
