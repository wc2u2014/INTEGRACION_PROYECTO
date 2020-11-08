<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    //
    public function estudiante_estado() {
        return $this->belongsTo('App\estado','idEstado');
    }
    
    public function estudiante_rela(){
        return $this->hasMany('App\relacion_estudiante_curso','idEstudiante');
    }
}
