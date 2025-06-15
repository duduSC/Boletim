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
     */
    public function rules(): array
    {
        // Regras comuns a create e update
        $regras = [
            "nota" => 'required|numeric|min:0|max:10',
            
            "aluno_id" => 'required|integer|exists:alunos,id',
            "professor_id" => 'required|integer|exists:professores,id',
            'materia_id' => 'required|integer|exists:materias,id',
            
            "semestre" => [
                'required',
                'string',
                'max:7',
            ],
        ];

        $regraUnique = Rule::unique("boletins")->where(function ($query) {
            return $query
                ->where("semestre", $this->semestre)
                ->where("aluno_id", $this->aluno_id)
                ->where("materia_id", $this->materia_id)
                ->where("professor_id", $this->professor_id);
        });

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $boletim = $this->route('boletim');
            $regraUnique->ignore($boletim->id);
        }

        // Adiciona a regra de unicidade construída às regras do semestre
        $regras['semestre'][] = $regraUnique;

        return $regras;
    }

    public function messages(): array
    {
        return [
            'nota.required' => 'O campo nota é obrigatório.',
            'nota.numeric' => 'A nota deve ser um valor numérico.',
            'semestre.required' => 'O campo semestre é obrigatório.',
            'semestre.max' => 'O campo semestre deve conter no máximo 7 caracteres.',
            'semestre.unique' => 'Já existe um lançamento de nota para este aluno, com este professor, nesta matéria e neste semestre.',
            'aluno_id.exists' => 'O aluno selecionado não é válido.',
            'professor_id.exists' => 'O professor selecionado não é válido.',
            'materia_id.exists' => 'A matéria selecionada não é válida.',
        ];
    }
}