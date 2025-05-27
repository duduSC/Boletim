<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = "disciplinas";
    protected $fillable = ["nome","telefone","email"];
}
