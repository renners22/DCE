<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;

    public function inscripciones() {
        return $this->hasMany(Inscripciones::class, 'estudiante_id', 'id');
    }
   

    
}
