<?php

use Illuminate\Database\Seeder;

class OutrosClientesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outrosclientes')->insert([
            'nome' => 'Jorge Capris',
            'idcliente' => 1,
            'email' => 'j@w.com',
            'contacto' =>'232460006',
            'telemovel' =>'961234567',
        ]);
    }
}
