<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkRelaEstCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relacion_estudiante_cursos', function (Blueprint $table) {
            //
            $table->foreign('idEstudiante')->references('id')->on('estudiantes');
            $table->foreign('idCurso')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relacion_estudiante_cursos', function (Blueprint $table) {
            //
        });
    }
}
