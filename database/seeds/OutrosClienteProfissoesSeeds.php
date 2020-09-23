<?php

use Illuminate\Database\Seeder;

class OutrosClienteProfissoesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outrosclientesprofissoes')->insert([
            'idprofissao' => 2,
            'idoutros' => 1,
        ]);
    }
}
