<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'nik' => ['required', 'string', 'size:16', 'unique:users,nik'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,username', 'alpha_num'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telp' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'nik.required' => __('messages.validation_nik_required'),
            'nik.size' => __('messages.validation_nik_size'),
            'nik.unique' => __('messages.validation_nik_unique'),
            'username.unique' => __('messages.validation_username_unique'),
            'username.alpha_num' => __('messages.validation_username_alpha_num'),
            'email.unique' => __('messages.validation_email_unique'),
            'password.min' => __('messages.validation_password_min'),
            'password.confirmed' => __('messages.validation_password_confirmed'),
        ];
    }
}
