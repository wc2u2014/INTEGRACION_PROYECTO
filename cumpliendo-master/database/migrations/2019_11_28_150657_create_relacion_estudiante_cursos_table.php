<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionEstudianteCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_estudiante_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idEstudiante');
            $table->unsignedInteger('idCurso');
            $table->timestamps();
            $table->string('userCreador')->nullable();
            $table->string('userModificador')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relacion_estudiante_cursos');
    }
}
