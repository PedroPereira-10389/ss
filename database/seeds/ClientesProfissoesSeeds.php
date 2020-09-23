<?php

use Illuminate\Database\Seeder;

class ClientesProfissoesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientesprofissoes')->insert([
            'idprofissao' => 1,
            'idcliente' => 1,
        ]);
    }
}
