<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdepartamentos', function (Blueprint $table) {
            $table->bigIncrements('idrelacao');
            $table->unsignedBigInteger('idutilizador');
            $table->unsignedBigInteger('iddepartamento');
            $table->timestamps();
            $table->foreign('idutilizador')
            ->references('idutilizador')->on('utilizadores')
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
        Schema::dropIfExists('userdepartamentos');
    }
}
