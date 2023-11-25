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
        Schema::create('materia_estudiante', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('estudiante_id');
            // $table->unsignedBigInteger('materia_id');
            // $table->unique('estudiante_id', 'materia_id'); //garantiza que no pueda haber duplicados
            // $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            // $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->foreignId('estudiante_id')->nullable()->constrained('estudiantes')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('materia_id')->nullable()->constrained('materias')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_estudiante');
    }
};
