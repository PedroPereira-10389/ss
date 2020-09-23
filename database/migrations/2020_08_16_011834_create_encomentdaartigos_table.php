<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncomentdaartigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomentdaartigos', function (Blueprint $table) {
            $table->bigIncrements('idrelacao');
            $table->unsignedBigInteger('idencomenda');
            $table->unsignedBigInteger('idproduto');
            $table->integer('quantidade');
            $table->date('datasaida');
            $table->string('localdescarga');
            $table->time('horadescarga');
            $table->unsignedBigInteger('idutilizador');
            $table->timestamps();
            $table->foreign('idencomenda')
            ->references('idencomenda')->on('encomendas')
            ->onDelete('cascade');
            $table->foreign('idproduto')
            ->references('idproduto')->on('produtos')
            ->onDelete('cascade');
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
        Schema::dropIfExists('encomentdaartigos');
    }
}
