<?php

use Illuminate\Database\Seeder;

class ProfissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profissoes')->insert([
            ['nomeprofissao' => 'Administrador','area' => 'Administracao'],
            ['nomeprofissao' => 'Web Developer','area' => 'Programação'],
            ['nomeprofissao' => 'DBA','area' => 'Base Dados'],
            ['nomeprofissao' => 'Designer','area' => 'Design'],
           
        ]);
        
    }
}
