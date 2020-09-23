<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            ['idutilizador' => 1,'nomedepartamento' => 'Software'],
            ['idutilizador' => 1,'nomedepartamento' => 'Hardware'],
            ['idutilizador' => 1,'nomedepartamento' => 'Admnistritativo'],
            ['idutilizador' => 1,'nomedepartamento' => 'Financeiro'],
            
        ]);
    }
}
