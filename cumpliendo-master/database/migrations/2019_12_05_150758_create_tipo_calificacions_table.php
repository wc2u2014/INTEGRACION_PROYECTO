<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_calificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calificacion');
            $table->string('puntos');
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
        Schema::dropIfExists('tipo_calificacions');
    }
}
