<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReunioesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunioes', function (Blueprint $table) {
            $table->bigIncrements('idreuniao');
            $table->unsignedBigInteger('idutilizador'); 
            $table->unsignedBigInteger('idcliente');
            $table->string('nome');
            $table->date('datainicio');
            $table->date('datafim');
            $table->time('horainicio');
            $table->time('horafim');
            $table->integer('sala');
            $table->string('descricao');
            $table->timestamps();
            $table->foreign('idutilizador')
            ->references('idutilizador')->on('utilizadores')
            ->onDelete('cascade');
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
        Schema::dropIfExists('reunioes');
    }
}
