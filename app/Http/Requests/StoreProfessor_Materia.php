<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfessor_Materia extends FormRequest
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
        $regras = [
            "professor_id" => ["required"],
            "materia_id" => "required",
        ];
        $regraUnique = Rule::unique("professores_materias")->where(function ($query) {
            return $query
                ->where("professor_id", $this->professor_id)
                ->where("materia_id", $this->materia_id);
        });
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $professores_materias = $this->route("professores_materia");
            $regraUnique->ignore($professores_materias->id);
        };
        $regras["professor_id"][] = $regraUnique;
        return $regras;
    }

    public function messages()
    {
        return [
            "professor_id.required" => "O campo professsor é obrigatório!",
            "materia_id.required" => "O campo professsor é obrigatório!",
            "professor_id.unique" => "Esse professor já leciona essa matéria!"
        ];
    }
}
