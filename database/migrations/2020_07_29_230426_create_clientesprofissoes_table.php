<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesprofissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientesprofissoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idprofissao');
            $table->unsignedBigInteger('idcliente');
            $table->timestamps();
            $table->foreign('idprofissao')
            ->references('idprofissao')->on('profissoes')
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
        Schema::dropIfExists('clientesprofissoes');
    }
}
