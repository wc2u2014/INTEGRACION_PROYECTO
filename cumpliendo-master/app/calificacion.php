<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
    //
    public function calificacion_user() {
        return $this->belongsTo('App\User','idUser');
    }
    public function calificacion_relacion() {
        return $this->belongsTo('App\relacion_estudiante_curso','idRelacion');
    }
    public function calificacion_tipo() {
        return $this->belongsTo('App\tipo_calificacion','idCalificacion');
    }
}
