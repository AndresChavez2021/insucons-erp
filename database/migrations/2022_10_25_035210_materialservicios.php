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
        Schema::create('materialservicios', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad')->nullable();

            $table->unsignedBigInteger('material_id')->nullable()
            ->foreign('material_id')->references('id')->on('materiales')
            ->onDelete('set null');
            $table->unsignedBigInteger('servicio_id')->nullable()
            ->foreign('servicio_id')->references('id')->on('servicios')
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
        Schema::dropIfExists('materialservicios');
    }
};
