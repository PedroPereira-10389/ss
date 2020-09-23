<?php

use Illuminate\Database\Seeder;

class UtilizadorProfissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilizadorprofissoes')->insert([
            'idutilizador' => 1,
            'idprofissao' => 1,
        ]);
    }
}
