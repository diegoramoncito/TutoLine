<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('objetivos');
        Schema::create('objetivos', function (Blueprint $table) {
            $table->id('id_objetivo');
            $table->string('nombre_objetivo',50);
            $table->string('descripcion_objetivo');
            $table->string('estado_objetivo');
            $table->unsignedBigInteger('alumno_id_alumno')->nullable();
            $table->foreign('alumno_id_alumno')->references('id_alumno')->on('alumnos')->onDelete('CASCADE');
            $table->unsignedBigInteger('tutor_id_tutor')->nullable();
            $table->foreign('tutor_id_tutor')->references('id_tutor')->on('tutors')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetivos');
    }
}
