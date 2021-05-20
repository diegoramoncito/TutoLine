<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tutors');
        Schema::create('tutors', function (Blueprint $table) {
            $table->id('id_tutor');
            $table->string('nombre_tutor',50);
            $table->string('apellido_tutor',50);
            $table->timestamp('fecha_nacimiento_tutor', $precision = 0);
            $table->string('email_tutor',50);
            $table->string('password_tutor',25);
            $table->integer('telefono_tutor');
            $table->string('formacion_academica',2);
            $table->unsignedBigInteger('categorias_id_categoria')->nullable();
            $table->foreign('categorias_id_categoria')->references('id_categoria')->on('categorias')->onDelete('CASCADE');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('tutors');
    }
}
