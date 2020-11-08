<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jornada extends Model
{
    //
    public function jornada_curso(){
        return $this->hasMany('App\cursos','idJornada');
    }
}
