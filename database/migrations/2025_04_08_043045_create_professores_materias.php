<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\TableExtension;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('professores_materias', function (Blueprint $table) {
            $table->id();
            $table->foreignId("materia_id")->constrained("materias")->onDelete("cascade");
            $table->foreignId("professor_id")->constrained("professores")->onDelete("cascade");
            $table->unique(["materia_id","professor_id"],"professor_materia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professores_materias');
    }
};
