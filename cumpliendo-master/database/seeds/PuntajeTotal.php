<?php

use Illuminate\Database\Seeder;
use App\tipo_calificacion;

class PuntajeTotal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipo_calificacion = new tipo_calificacion();
        $tipo_calificacion->calificacion = 'Total Puntos';
        $tipo_calificacion->puntos = '400';
        $tipo_calificacion->userCreador = 'superAdmin';
        $tipo_calificacion->save();
    }
}
