<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCalificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calificacions', function (Blueprint $table) {
            //
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idRelacion')->references('id')->on('relacion_estudiante_cursos');
            $table->foreign('idCalificacion')->references('id')->on('tipo_calificacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calificacions', function (Blueprint $table) {
            //
        });
    }
}
