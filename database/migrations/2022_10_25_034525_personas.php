<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            //cliente
            $table->string('nit')->nullable();
            //el cliente puede ser una persona o una empresa
            $table->string('tipo')->nullable(); //
            //Empleado
            $table->date('fecha_nacimiento')->nullable();
            $table->float('sueldo',9,2)->nullable();
            //solapamiento incompleto
            $table->boolean('T_C');
            $table->boolean('T_E');
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
        Schema::dropIfExists('personas');
    }
};
