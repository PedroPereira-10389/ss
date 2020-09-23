<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesdepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientesdepartamentos', function (Blueprint $table) {
            $table->bigIncrements('idrelacao');
            $table->unsignedBigInteger('idcliente');
            $table->unsignedBigInteger('iddepartamento');
            $table->foreign('idcliente')
            ->references('idcliente')->on('clientes')
            ->onDelete('cascade');
            $table->foreign('iddepartamento')
            ->references('iddepartamento')->on('departamentos')
            ->onDelete('cascade');
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
        Schema::dropIfExists('clientesdepartamentos');
    }
}
