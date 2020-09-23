<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutrosclientesdepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outrosclientesdepartamentos', function (Blueprint $table) {
            $table->bigIncrements('idrelacao');
            $table->unsignedBigInteger('idoutros');
            $table->unsignedBigInteger('iddepartamento');
            $table->foreign('idoutros')
            ->references('idoutros')->on('outrosclientes')
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
        Schema::dropIfExists('outrosclientesdepartamentos');
    }
}
