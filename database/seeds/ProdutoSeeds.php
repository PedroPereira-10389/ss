<?php

use Illuminate\Database\Seeder;

class ProdutoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'referencia' => 'R01201245789',
            'descricao' => 'Artigo Teste',
            'precovenda' => 10.50,
            'precocusto' => 9.50,
            'desconto' => 0.05,
            'iva' => 0.23,
            'validadeinicio' => '2020/06/11',
            'validadefim' => '2020/07/12',
            'lote' => 'LT0.055',
        ]);
    }
}
