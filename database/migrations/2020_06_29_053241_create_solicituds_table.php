<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_prestamo')->unsigned();
            $table->bigInteger('id_ferreteria')->unsigned()->nullable(); 
            $table->integer('user_crea')->default(0);
            $table->integer('user_update')->default(0);
            $table->string('origen');
            $table->decimal('monto_solicitado')->nullable();
            $table->boolean('estado')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_prestamo')->references('id')->on('parametros');
            $table->foreign('id_ferreteria')->references('id')->on('ferreterias');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
