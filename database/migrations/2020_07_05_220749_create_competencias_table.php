<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencias', function (Blueprint $table) {
            $table->bigIncrements('idcompetencia');
            $table->unsignedBigInteger('idutilizador'); 
            $table->string('nomecompetencia');
            $table->integer('tipo');
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
        Schema::dropIfExists('competencias');
    }
}
