<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMateriaRequest extends FormRequest
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
            "nome" => "required|string|max:60",
            "carga_horaria" => "required|integer",
            "descricao"=> "nullable|max:80"
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'carga_horaria.required' => 'O campo carga horária é obrigatório',
            'carga_horaria.integer' => 'O campo carga horária deve conter somente números',
            'descricao.max:80'=>'O campo descricão não deve ultrapassar 80 caracteres'
        ];
    }
}
