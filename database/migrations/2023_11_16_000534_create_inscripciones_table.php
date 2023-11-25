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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inscripcion');
            $table->boolean('estado');
            $table->string('semestre');
            $table->string('año_academico');
            // esta es una forma de relacionar anteriormente
            // $table->unsignedBigInteger('estudiante_id');
            // $table->unsignedBigInteger('materia_id');
            // $table->foreign('estudiante_id')->references('id')->on('estudiantes'); // estudiantes
            // $table->foreign('materia_id')->references('id')->on('materias'); // materias

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
        Schema::dropIfExists('inscripciones');
    }
};
