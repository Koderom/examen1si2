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
        Schema::create('demandante_procesos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('abogado_id');
            $table->unsignedBigInteger('proceso_judicial_id');
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('abogado_id')->references('id')->on('abogados')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('demandante_procesos');
    }
};
