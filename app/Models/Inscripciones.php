<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    use HasFactory;

    public function estudiante() {
        return $this->belongsTo(Estudiantes::class, 'estudiante_id', 'id');
    }
    public function materia() {
        return $this->belongsTo(Materias::class, 'materia_id', 'id');
    }
    public function calificacion() {
        return $this->hasOne(Calificaciones::class, 'inscripcion_id', 'id');
    }

}
