<?php

use Illuminate\Database\Seeder;
use App\estado;
class estados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estado = new estado();
        $estado->estado = 'activo';
        $estado->userCreador = 'superAdmin';
        $estado->save();
        $estado = new estado();
        $estado->estado = 'inactivo';
        $estado->userCreador = 'superAdmin';
        $estado->save();
    }
}
