<?php

use Illuminate\Database\Seeder;

class FuncionarioDepartamentoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionariosdepartamentos')->insert([
            'idfuncionario' => 1,
            'iddepartamento' => 2,
        ]);
    }
}
