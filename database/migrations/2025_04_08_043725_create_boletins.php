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
            $table->unsignedInteger("aluno_matricula");// só pode ter integer positivos
            $table->unsignedInteger("professor_id");
            $table->unsignedInteger("materia_id");
            $table->foreign("aluno_matricula","aluno_fkeys")
                    ->references("id")
                    ->on("alunos");
            $table->foreign("professor_id","professors_fkeys")
                    ->references("id")
                    ->on("professores");
            $table->foreign("materia_id","materia_fkey")
                    ->references("id")
                    ->on("materias");
            $table->unique(["aluno_matricula","materia_id","professor_id","semestre"],"uc_aluno_semestre_materia");
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
