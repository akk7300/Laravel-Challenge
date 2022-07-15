<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|min:6',
            'password' => 'required|min:8'

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email is required',
            'email.min' => 'email is invalid',
            'password.required' => 'password is required',
            'password.min' => 'password is invalid',
        ];
    }
}
