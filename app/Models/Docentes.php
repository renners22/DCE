<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    use HasFactory;
    public function materias() {
        return $this->belongsToMany(Materias::class, 'materia_profesor', 'profesor_id', 'materia_id');
    }
}
