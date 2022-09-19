<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
        'nome' => 'required|string|max:255',
        'login' => 'required|string|max:255',
        'senha' => 'sometimes|string|min:6|max:8',
        'saldo_atual' => 'sometimes|numeric|min:0|max:9999.99',
      ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
      return [
        'nome.required' => 'O nome é obrigatório',
        'nome.string' => 'O nome deve ser uma string',
        'nome.max' => 'O nome deve ter no máximo 255 caracteres',
        'login.required' => 'O login é obrigatório',
        'login.string' => 'O login deve ser uma string',
        'login.max' => 'O login deve ter no máximo 255 caracteres',
        'senha.string' => 'A senha deve ser uma string',
        'senha.min' => 'A senha deve ter no mínimo 6 caracteres',
        'senha.max' => 'A senha deve ter no máximo 8 caracteres',
        'saldo_atual.numeric' => 'O saldo atual deve ser um número',
        'saldo_atual.min' => 'O saldo atual deve ser no mínimo 0',
        'saldo_atual.max' => 'O saldo atual deve ser no máximo 9999.99',
      ];
    }
}
