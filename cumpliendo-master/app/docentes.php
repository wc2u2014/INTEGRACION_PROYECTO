<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docentes extends Model
{
    //
    public function docente_estado() {
        return $this->belongsTo('App\estado','idEstado');
    }
    public function docente_curso() {
        return $this->belongsTo('App\cursos','idCurso');
    }
}
