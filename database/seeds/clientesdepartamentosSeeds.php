<?php

use Illuminate\Database\Seeder;

class clientesdepartamentosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientesdepartamentos')->insert([
            'idcliente' => 1,
            'iddepartamento' => 1,
        ]);
    }
}
