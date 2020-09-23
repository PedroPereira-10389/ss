<?php

use Illuminate\Database\Seeder;

class RelacaoHabilitacaoUtilizadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilizadoreshabilitacoes')->insert([
            'idutilizador' => 1,
            'idhabilitacao' => 4,
            'comprovativo' => 'sasdasda',
        ]);
    }
}
