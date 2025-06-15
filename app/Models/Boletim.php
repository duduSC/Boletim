<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boletim extends Model
{
    protected $table = "boletins";
    protected $fillable= ["nota","semestre","aluno_id","professor_id","materia_id"];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function professor(){
        return $this->belongsTo(Professor::class);
    }
    public function materia(){
        return $this->belongsTo(Materia::class);
    }
}
