<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('idhorario');
            $table->unsignedBigInteger('idfuncionario');
            $table->date('datainicio');
            $table->date('datafim');
            $table->time('horainicio');
            $table->time('horafim');
            $table->timestamps();
            $table->foreign('idfuncionario')
            ->references('idfuncionario')->on('funcionarios')
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
        Schema::dropIfExists('horarios');
    }
}
