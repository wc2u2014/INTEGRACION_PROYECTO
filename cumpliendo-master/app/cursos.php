<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    //
    public function curso_jornada() {
        return $this->belongsTo('App\jornada','idJornada');
    }
    public function curso_rela(){
        return $this->hasMany('App\relacion_estudiante_curso','idCurso');
    }
    public function curso_docente(){
        return $this->hasMany('App\docentes','idCurso');
    }
}
