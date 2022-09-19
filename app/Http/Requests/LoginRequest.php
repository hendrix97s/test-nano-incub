<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
        'login' => 'required|string|email',
        'senha' => 'required|min:6',
      ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
      return [
        'login.required' => __('auth.form.errors.login.required'),
        'login.string' => __('auth.form.errors.login.string'),
        'login.email' => __('auth.form.errors.login.email'),
        'senha.required' => __('auth.form.errors.senha.required'),
        'senha.min' => __('auth.form.errors.senha.min'),
      ];
    }

}
