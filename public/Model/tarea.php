<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tareas');
        Schema::create('tareas', function (Blueprint $table) {
            $table->id('id_tarea');
            $table->string('nombre_tarea',50);
            $table->string('descripcion_tarea');
            $table->string('estado_tarea',50);
            $table->timestamp('fecha_entrega', $precision = 0);
            $table->decimal('calificacion_tarea',5,2);
            $table->string('comentarios_tarea');
            $table->string('entregable_tarea');
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
        Schema::dropIfExists('tareas');
    }
}
