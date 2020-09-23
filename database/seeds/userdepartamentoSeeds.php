<?php

use Illuminate\Database\Seeder;

class userdepartamentoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userdepartamentos')->insert([
            'idutilizador' => 1,
            'iddepartamento' => 1,
        ]);
    }
}
