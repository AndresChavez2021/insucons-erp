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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('descripcion');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('persona_id')->nullable()
            ->foreign('persona_id')->references('id')->on('personas')
            ->onDelete('set null');

            $table->unsignedBigInteger('proveedor_id')->nullable()
            ->foreign('proveedor_id')->references('id')->on('proveedores')
            ->onDelete('set null');
            
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
        Schema::dropIfExists('notas');
    }
};
