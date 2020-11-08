<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_calificacion extends Model
{
    //
    public function tipo_calificacion(){
        return $this->hasMany('App\calificacion','idCalificacion');
    }
}
