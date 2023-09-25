<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormularioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3|max:100',
            'cpf' => 'required',
            'nome_rua' => 'required',
            'numero_rua' => 'required', 
            'email' => 'required|email',
            'telefone_1' => 'required',
            'telefone_2' => 'nullable',
            'curriculo_lattes' => 'required',
            'cargo_id' => ['required', Rule::notIn(['Selecione uma opção'])],
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
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.string' => 'O campo Nome deve ser uma string',
            'nome.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo Nome deve ter no máximo 100 caracteres',
            'cpf.required' => 'O campo CPF é obrigatório',
            'nome_rua.required' => 'O campo Endereço é obrigatório',
            'numero_rua.required' => 'O campo Endereço é obrigatório',
            'email.required' => 'O campo Email é obrigatório',
            'email.email' => 'O campo Email deve ser um email válido',
            'telefone_1.required' => 'O campo Telefone é obrigatório',
            'curriculo_lattes.required' => 'O campo Currículo lattes é obrigatório',
            'cargo_id.required' => 'O campo Cargo é obrigatório',
            'cargo_id.not_in' => 'O campo Cargo é obrigatório',
        ];
    }
}
