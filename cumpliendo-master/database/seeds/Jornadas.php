<?php

use Illuminate\Database\Seeder;
use App\jornada;

class Jornadas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jornada = new jornada();
        $jornada->jornada = 'mañana';
        $jornada->userCreador = 'superAdmin';
        $jornada->save();
        $jornada = new jornada();
        $jornada->jornada = 'tarde';
        $jornada->userCreador = 'superAdmin';
        $jornada->save();
        $jornada = new jornada();
        $jornada->jornada = 'Sin Jornada';
        $jornada->userCreador = 'superAdmin';
        $jornada->save();
    }
}
