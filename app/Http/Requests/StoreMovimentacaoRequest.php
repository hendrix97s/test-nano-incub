<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentacaoRequest extends FormRequest
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
        'tipo_movimentacao' => 'required|in:entrada,saida',
        'valor' => 'required|numeric',
        'observacao' => 'nullable|string',
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
        'tipo_movimentacao.required' => 'Selecionre o tipo de movimentação',
        'tipo_movimentacao.in' => 'O tipo de movimentação deve ser entrada ou saída',
        'valor.required' => 'Valor da movimentação é obrigatório',
        'valor.numeric' => 'Valor da movimentação deve ser um número',
      ];
    }
}
