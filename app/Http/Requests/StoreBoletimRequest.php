<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBoletimRequest extends FormRequest
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
        $boletimId= $this->boletins->id;
        return [
            "nota" => 'required|numeric',
            "aluno_id" => 'required|integer|exists::Alunos,id',
            "professor_id" => 'required|integer|exists::Professores,id',
            'materia_id' => 'required|integer|exists::Materias,id',
            "semestre" => [
                'required',
                'string',
                'max:7',
                Rule::unique("boletins")->where(column:function ($query){
                    return $query
                    ->where("semestre",$this->semestre)
                    ->where("aluno_id",$this->aluno_id)
                    ->where("materia_id",$this->materia_id)
                    ->where("professor_id",$this->professor_id);
                })->ignore($boletimId)
        ],
        ];
    }
    public function messages(){
        return[
            'nota.required' => 'O campo nota é obrigatório.',
            'nota.numeric' => 'A nota deve ser um valor numérico.',
            'semestre.required' => 'O campo semestre é obrigatório.',
            'semestre.max' => 'O campo semestre deve conter no máximo 7 caracteres.',
            'semestre.unique' => 'Já existe um lançamento de nota para este aluno, com este professor, nesta matéria e neste semestre.',
            'aluno_id.exists' => 'O aluno selecionado não é válido.',
            'professor_id.exists' => 'O professor selecionado não é válido.',
            'materia_id.exists' => 'A matéria selecionada não é válida.', ];
}
}
