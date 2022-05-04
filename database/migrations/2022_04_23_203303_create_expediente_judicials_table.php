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
        Schema::create('expediente_judicials', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_expediente',50);
            $table->date('fecha_ingreso');
            $table->string('distrito',200);
            $table->string('oficina');
            $table->unsignedBigInteger('proceso_judicial_id');
            $table->timestamps();

            $table->foreign('proceso_judicial_id')->references('id')->on('proceso_judicials')
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
        Schema::dropIfExists('expediente_judicials');
    }
};
