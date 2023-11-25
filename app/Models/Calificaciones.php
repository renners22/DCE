<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;

    public function inscripcion() {
        return $this->belongsTo(Inscripciones::class, 'inscripcion_id', 'id');
    }
}
