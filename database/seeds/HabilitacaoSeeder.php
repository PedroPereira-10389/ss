<?php

use Illuminate\Database\Seeder;

class HabilitacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habilitacoes')->insert([
            ['nomehabilitacao' => 'Básico','grau' => '3'],
            ['nomehabilitacao' => 'Secundário','grau' => '4'],
            ['nomehabilitacao' => 'Ctesp','grau' => '5'],
            ['nomehabilitacao' => 'Licenciatura','grau' => '6'],
            ['nomehabilitacao' => 'Mestrado','grau' => '7'],
            ['nomehabilitacao' => 'Doutoramento','grau' => '8'],
            ['nomehabilitacao' => 'Pós-Graduação','grau' => '9'],
        ]);
    }
}
