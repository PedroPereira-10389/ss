<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('idproduto');
            $table->string('referencia');
            $table->string('descricao');
            $table->float('precovenda');
            $table->float('precocusto');
            $table->float('desconto');
            $table->float('iva');
            $table->string('validadeinicio');
            $table->string('validadefim');
            $table->string('lote');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
