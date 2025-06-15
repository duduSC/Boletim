<?php
namespace App\Http\Requests\Traits;

trait ValidatePeople{

    protected function pessoaRules(){
        return [
            "nome" => [
                'required',
                'string',
                'max:50',
                "regex:/^[\p{L}\s\'-]+$/u"
            ],
            "telefone" => "required|digits:11",
            "email" => "required|email|max:70",
            "image" => "nullable|image",
        ];
    }
}