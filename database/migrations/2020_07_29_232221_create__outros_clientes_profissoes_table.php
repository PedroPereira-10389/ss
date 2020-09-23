<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutrosClientesProfissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outrosclientesprofissoes', function (Blueprint $table) {
            $table->bigIncrements('idrelcao');
            $table->unsignedBigInteger('idprofissao');
            $table->unsignedBigInteger('idoutros');
            $table->timestamps();
            $table->foreign('idoutros')
            ->references('idoutros')->on('outrosclientes')
            ->onDelete('cascade');
            $table->foreign('idprofissao')
            ->references('idprofissao')->on('profissoes')
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
        Schema::dropIfExists('_outros_clientes_profissoes');
    }
}
