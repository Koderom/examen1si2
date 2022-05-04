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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numero');
            $table->date('fecha');
            $table->integer('fojas');
            $table->string('documento',300);
            $table->string('referencia',500);
            $table->string('contenido',300);
            $table->unsignedBigInteger('expediente_judicial_id');
            $table->timestamps();

            $table->foreign('expediente_judicial_id')->references('id')->on('expediente_judicials')
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
        Schema::dropIfExists('archivos');
    }
};
