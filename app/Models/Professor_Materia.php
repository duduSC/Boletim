<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professor_Materia extends Model
{
    protected $table= "professores_materias";
    protected $fillable = ["materia_id","professor_id"];

    public function professor():BelongsTo{
        return $this->belongsTo(Professor::class);
    }
    public function materia():BelongsTo{
        return $this->belongsTo(Materia::class);
    }
}
