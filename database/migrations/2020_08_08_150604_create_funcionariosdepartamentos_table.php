<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosdepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionariosdepartamentos', function (Blueprint $table) {
            $table->bigIncrements('idrelacao');
            $table->unsignedBigInteger('idfuncionario');
            $table->unsignedBigInteger('iddepartamento');
            $table->timestamps();
            $table->foreign('idfuncionario')
            ->references('idfuncionario')->on('funcionarios')
            ->onDelete('cascade');
            $table->foreign('iddepartamento')
            ->references('iddepartamento')->on('departamentos')
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
        Schema::dropIfExists('funcionariosdepartamentos');
    }
}
