<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataRequest extends FormRequest
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
    protected function prepareForValidation(): void{
         $this->merge([
            "telefone"=> preg_replace("/\D/","",$this->input("telefone"))
        ]);
    }
    
    public function rules(): array
    {   
        return [
            "nome"=> [
                'required',
                'string',
                'max:50',
                "regex:/^[\p{L}\s\'-]+$/u"
            ],
            "telefone"=> "required|digits:11",
            "email"=> "required|email|max:70",
            "image"=> "nullable|image"
        ];
    }
    public function messages(){
        return [
            'nome.required' => 'O campo nome completo é obrigatório.',
            'email.required' => 'Por favor, insira um endereço de e-mail.',
            'email.email' => 'O e-mail informado não é válido.',
            'nome.regex'=> 'O nome deve conter somente letras, espaços, hífens e apóstrofos',
            'telefone.digits'=>"O telefone não pode conter letras",
            'telefone.digits:11'=>"O telefone não ter mais de 11 caracteres"
        ];
    }
}
