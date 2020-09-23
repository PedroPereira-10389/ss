<?php

use Illuminate\Database\Seeder;

class outrosclientesdepartamentosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outrosclientesdepartamentos')->insert([
            'idoutros' => 1,
            'iddepartamento' => 1,
        ]);
    }
}
