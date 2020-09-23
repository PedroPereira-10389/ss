<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('idfuncionario');
            $table->unsignedBigInteger('idutilizador'); 
            $table->string('nome');
            $table->string('foto');
            $table->string('email');
            $table->string('idade');
            $table->string('morada');
            $table->string('cidade');
            $table->string('pais');
            $table->string('contacto');
            $table->date('dataempregoinicio');
            $table->date('dataempregofim');
            $table->time('horainicio');
            $table->time('horafim');
            $table->integer('primeiropreco');
            $table->integer('ultimopreco');
            $table->float('precoacordado');
            $table->integer('quantidade');
            $table->integer('estado');
            $table->timestamps();
            $table->foreign('idutilizador')
            ->references('idutilizador')->on('utilizadores')
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
        Schema::dropIfExists('funcionarios');
    }
}
