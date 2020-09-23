<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class ReuniaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reunioes')->insert([
            'idutilizador' => 1,
            'idcliente' => 1,
            'nome' => 'Reunião com Cliente',
            'datainicio' => Carbon::parse('2020/05/06'),
            'datafim' => Carbon::parse('2020/05/09'),
            'horainicio' => '19:30',
            'horafim' => '20:30',
            'sala' => 23,
            'descricao' => 'asdasdadsada',

        ]);
    }
}
