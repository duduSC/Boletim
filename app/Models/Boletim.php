<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boletim extends Model
{
    protected $table = "boletins";
    protected $fillable= ["nota","semestre","alunos_matricula","professores_id","materias_id"];

    public function alunos(){
        return $this->belongsTo(Aluno::class);
    }

    public function professores(){
        return $this->belongsTo(Professor::class);
    }
    public function materias(){
        return $this->belongsTo(Materia::class);
    }
}
