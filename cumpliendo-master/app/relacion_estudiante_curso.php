<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class relacion_estudiante_curso extends Model
{
    //
    public function rela_estudiante() {
        return $this->belongsTo('App\estudiante','idEstudiante');
    }
    public function rela_curso() {
        return $this->belongsTo('App\cursos','idCurso');
    }
    public function relacion_calificacion(){
        return $this->hasMany('App\calificacion','idRelacion');
    }

}
