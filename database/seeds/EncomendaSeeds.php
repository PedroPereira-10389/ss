<?php

use Illuminate\Database\Seeder;

class EncomendaSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encomendas')->insert([
            'idcliente' => 1,
            'dataentrada' => '2020/04/06',
            'total' => 120.75,
            'desconto' => 0.05,
            'localcarga' => 'Rua Y',
            'horacarga' => '09:00',
     
        ]);
    }
}
