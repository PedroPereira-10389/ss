<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcomendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->bigIncrements('idencomenda');
            $table->unsignedBigInteger('idcliente');
            $table->date('dataentrada');
            $table->float('total');
            $table->float('desconto');
            $table->string('localcarga');
            $table->time('horacarga');
            $table->integer('estado');
            $table->timestamps();
            $table->foreign('idcliente')
            ->references('idcliente')->on('clientes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_ecomendas');
    }
}
