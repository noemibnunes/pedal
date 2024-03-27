<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nome' => [
                'required', 
                'string',  
                'min:3',  
                'max:255', 
            ],
            'cpf' => [
                'required', 
                'string',   
                'unique:users,cpf', 
                'size:11',  
            ],
            'email' => [
                'required', 
                'email',    
                'unique:users,email', 
                'max:255', 
            ],
            'senha' => [
                'required', 
                'string',  
                'min:8',  
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
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.string' => 'O CPF deve ser um texto.',
            'cpf.unique' => 'O CPF já está em uso.',
            'cpf.size' => 'O CPF deve ter 11 dígitos.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço válido.',
            'email.unique' => 'O e-mail já está em uso.',
            'email.max' => 'O e-mail deve ter no máximo 255 caracteres.',
            'senha.required' => 'A senha é obrigatória.',
            'senha.string' => 'A senha deve ser um texto.',
            'senha.min' => 'A senha deve ter no mínimo 8 caracteres.',
        ];
    }
}
