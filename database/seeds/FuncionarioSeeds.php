<?php

use Illuminate\Database\Seeder;

class FuncionarioSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->insert([
            'idutilizador' => 1,
            'nome' => 'Abertino Maciel',
            'foto' => 'funcionario.jpg',
            'email' => 'funcionario@g.com',
            'idade' => '30',
            'morada' => 'Rua Exemplo',
            'pais' => 'Portugal',
            'cidade' => 'Viseu',
            'contacto' => '232455555',
            'dataempregoinicio' => '2020/04/06',
            'dataempregofim' => '2020/05/06',
            'primeiropreco' => 15,
            'ultimopreco' => 20,
            'quantidade' => 20,
            'precoacordado' => 5.5,
            'estado' => 0,
            
        ]);
    }
}
