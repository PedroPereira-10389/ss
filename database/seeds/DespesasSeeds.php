<?php

use Illuminate\Database\Seeder;

class DespesasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('despesas')->insert([
            'iddespesa' => 1,
            'descricao' => 'Despesa Gasóleo',
            'valor' => 30.05,
            'datadespesa' => '2020/09/08',
            'idutilizador' => 1,
            'formapagamento' => 'Dinheiro',
            'comprovativo' => 'comprovativo.pdf',
            'estado' => 0,
        ]);
    }
}
