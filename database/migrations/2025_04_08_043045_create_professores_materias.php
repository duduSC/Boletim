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
            $table->unsignedInteger("materias_id");
            $table->unsignedInteger("professores_id");
            $table->foreign("materias_id","professores_fkey")
                    ->references("id")
                    ->on('professores');
            $table->foreign("professores_id","materias_fkey")
                    ->references("id")
                    ->on('materias');
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
