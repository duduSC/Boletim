<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\ValidatePeople;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfessorRequest extends FormRequest
{
    use ValidatePeople;
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
    protected function prepareForValidation(): void
    {
        $this->merge([
            "cpf" => preg_replace("/\D/", "", $this->input("cpf")),
            "telefone" => preg_replace("/\D/", "", $this->input("telefone"))
        ]);
    }

    public function rules(): array
    {
        $commonRules = $this->pessoaRules();

        $especifedRules = [
            "cpf" => [
                "required",
                "cpf"
            ],
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $professor = $this->route('professor');
            $especifedRules['cpf'][] = Rule::unique('professores')->ignore($professor->id);
        } else {
            $especifedRules['cpf'][] = 'unique:professores,cpf';
        }

        return array_merge($commonRules, $especifedRules);
    }


    public function messages()
    {
        return [
            'nome.required' => 'O campo nome completo é obrigatório.',
            'email.required' => 'Por favor, insira um endereço de e-mail.',
            'email.email' => 'O e-mail informado não é válido.',
            'nome.regex' => 'O nome deve conter somente letras e espaços.',

            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos.',
            'cpf.unique' => 'Este CPF já está cadastrado no sistema.',

            'telefone.digits' => 'O telefone deve conter apenas números.',
            'telefone.max' => 'O telefone não deve ter mais de 11 caracteres.'
        ];
    }
}
