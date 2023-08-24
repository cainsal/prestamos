<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_solicituds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_solicitud')->unsigned();
            $table->bigInteger('id_agente')->unsigned();
            $table->bigInteger('id_banco')->unsigned();

            $table->bigInteger('id_prestamo')->unsigned();

            $table->integer('user_crea')->default(0);
            $table->integer('user_update')->default(0);
            $table->string('mensaje', 500);
            $table->decimal('monto_ofertado')->default(0.00);
            $table->integer('estadoCierre')->default(0);
            $table->string('plazo');
            $table->decimal('monto_cuota')->default(0.00);
            $table->string('TEA');
            $table->string('TCEA');
            $table->string('calificacion');
            $table->boolean('estado')->default(1);
            $table->timestamps();

            $table->foreign('id_solicitud')->references('id')->on('solicituds');
            $table->foreign('id_agente')->references('id')->on('users');
            $table->foreign('id_banco')->references('id')->on('parametros');
            $table->foreign('id_prestamo')->references('id')->on('parametros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta_solicituds');
    }
}
