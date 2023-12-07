<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    use HasFactory;
    public function materias() {
        
        // return $this->hasMany(Materias::class);
        // return $this->hasMany(Inscripciones::class, 'materia_id', 'id');
        return $this->belongsTo(Materias::class, 'materia_id', 'id');


        // return $this->belongsToMany(Materias::class, 'materia_id');

        // return $this->belongsToMany(Materias::class, 'materia_profesor', 'profesor_id', 'materia_id');
    }
}
