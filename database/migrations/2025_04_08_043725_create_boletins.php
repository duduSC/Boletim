<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boletins', function (Blueprint $table) {
            $table->id();
            $table->float("nota");
            $table->string("semestre",7);
            $table->unsignedInteger("alunos_matricula");// coluna que só tem numeros positvos
            $table->unsignedInteger("professores_id");
            $table->unsignedInteger("materias_id");
            $table->foreign("alunos_matricula","alunos_fkeys")
                    ->references("id")
                    ->on("alunos");
            $table->foreign("professores_id","professores_fkeys")
                    ->references("id")
                    ->on("professores");
            $table->foreign("materias_id","materias_fkey")
                    ->references("id")
                    ->on("materias");
            $table->unique(["alunos_matricula","materias_id","semestre"],"uc_aluno_semestre_materia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletins');
    }
};
