<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutrosclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outrosclientes', function (Blueprint $table) {
            $table->bigIncrements('idoutros');
            $table->unsignedBigInteger('idcliente');
            $table->string('nome');
            $table->string('email');
            $table->string('contacto');
            $table->string('telemovel');
            $table->timestamps();
            $table->foreign('idcliente')->references('idcliente')->on('clientes') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropIfExists('outrosclientes');
    }
}
