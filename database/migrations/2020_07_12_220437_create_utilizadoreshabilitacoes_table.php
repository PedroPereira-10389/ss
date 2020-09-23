<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilizadoreshabilitacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizadoreshabilitacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idutilizador');
            $table->unsignedBigInteger('idhabilitacao');
            $table->string('comprovativo');
            $table->timestamps();
            $table->foreign('idutilizador')
            ->references('idutilizador')->on('utilizadores')
            ->onDelete('cascade');
            $table->foreign('idhabilitacao')
            ->references('idhabilitacao')->on('habilitacoes')
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
        Schema::dropIfExists('utilizadoreshabilitacoes');
    }
}
