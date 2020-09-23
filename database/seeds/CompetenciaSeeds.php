<?php

use Illuminate\Database\Seeder;

class CompetenciaSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competencias')->insert([
            ['idutilizador' => 1,'nomecompetencia' => 'Laravel','tipo' => 1],
            ['idutilizador' => 1,'nomecompetencia' => 'Css','tipo' => 1],
            ['idutilizador' => 1,'nomecompetencia' => 'HTML5','tipo' => 1],
            ['idutilizador' => 1,'nomecompetencia' => 'Java','tipo' => 1],
        ]);
    
    }
}
