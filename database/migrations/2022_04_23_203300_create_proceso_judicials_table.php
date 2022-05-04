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
        Schema::create('proceso_judicials', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_registro');
            $table->dateTime('fecha_recepcion');
            $table->string('nombre_proceso',200);
            $table->string('tipo_proceso',200);
            $table->string('materia',200);
            $table->unsignedBigInteger('juez_id');
            $table->unsignedBigInteger('juzgado_id');
            $table->timestamps();

            $table->foreign('juez_id')->references('id')->on('juezs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('juzgado_id')->references('id')->on('juzgados')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proceso_judicials');
    }
};
