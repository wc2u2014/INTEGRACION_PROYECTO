<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    //
    public function estado_docente(){
        return $this->hasMany('App\docentes','idEstado');
    }
    public function estado_estudiante(){
        return $this->hasMany('App\estudiante','idEstado');
    }
}
