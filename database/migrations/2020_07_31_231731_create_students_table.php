<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("cedula");
            $table->string("email");
            $table->string("contrasenia");
            $table->string("tipo");
            $table->string("programa");
            $table->string("facultad");
            $table->integer("avatar");
            $table->string("semana")->nullable();
            $table->string("resueltas")->nullable();
            $table->integer("puntaje")->nullable();
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
        Schema::dropIfExists('students');
    }
}
