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
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->double('precio',9,2)->nullable();
            $table->unsignedBigInteger('medida_id')->nullable()
            ->foreign('medida_id')->references('id')->on('medidas')
            ->onDelete('set null');
            $table->unsignedBigInteger('marca_id')->nullable()
            ->foreign('marca_id')->references('id')->on('marcas')
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
        Schema::dropIfExists('materiales');
    }
};
