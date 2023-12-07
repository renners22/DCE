<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;

    public function inscripciones() {
        return $this->belongsTo(Inscripciones::class, 'materia_id', 'id');
    }

    // public function docentes() {
    //     return $this->belongsToMany(Docentes::class, 'materia_profesor', 'materia_id', 'profesor_id');
    // }
}
