<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->unsignedBigInteger('user_id');
            $table->string('user_nombre',100);
            $table->string('tabla',100);
            $table->char('accion');
            $table->unsignedBigInteger('objeto_id');
            $table->string('objeto_nombre',100);
            $table->timestamps();
        });

        DB::unprepared('
            create or replace procedure insertar_bitacora(fecha timestamp without time zone, usuario_id bigint, usuario_nombre  character varying, tabla_implicada character varying, accion_realizada character, objeto_implicado_id bigint, objeto_implicado_nombre character varying)
            language sql
            AS $$
                insert into bitacoras(fecha_hora,user_id,user_nombre,tabla,accion,objeto_id,objeto_nombre) values(fecha, usuario_id, usuario_nombre,tabla_implicada, accion_realizada, objeto_implicado_id, objeto_implicado_nombre);
            $$;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');

        DB::unprepared('drop procedure insertar_bitacora;');
    }
};
