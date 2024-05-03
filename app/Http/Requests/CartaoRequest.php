<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartaoRequest extends FormRequest
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
            'nome_titular' => [
                'required', 
                'string',  
                'min:3',  
                'max:255', 
            ],
            'numero_cartao' => [
                'required', 
                'min:16',  
                'max:255', 
            ],
            'data_validade' => [
                'required', 
                'date_format:Y-m'
            ],
            'tipo_cartao' => [
                'required'
            ],
            'bandeira_cartao' => [
                'required'
            ],
        ];
    }

    /**
     * Get custom validation messages for attributes.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'nome_titular.required' => 'O nome do titular é obrigatório.',
            'nome_titular.string' => 'O nome do titular deve ser um texto.',
            'nome_titular.min' => 'O nome do titular deve ter pelo menos 3 caracteres.',
            'nome_titular.max' => 'O nome do titular deve ter no máximo 255 caracteres.',
            'numero_cartao.required' => 'O número do cartão é obrigatório.',
            'numero_cartao.min' => 'O número do cartão deve ter pelo menos 16 caracteres.',
            'numero_cartao.max' => 'O número do cartão deve ter no máximo 255 caracteres.',
            'data_validade.required' => 'A data de vencimento é obrigatório.',
            'tipo_cartao.required' => 'O tipo do cartão é obrigatório.',
            'bandeira_cartao.required' => 'A bandeira do cartão é obrigatória.',
        ];
    }
}
