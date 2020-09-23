<?php

use Illuminate\Database\Seeder;

class RelacaoCompUtilizaSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilizadorescompetencias')->insert([
            'idutilizador' => 1,
            'idcompetencia' => 2,
            'nivel' =>30,
            'comprovativo'=>'asdasda',
            'idcriador' =>1
        ]);
    }
}
