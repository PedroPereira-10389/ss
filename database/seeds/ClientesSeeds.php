<?php

use Illuminate\Database\Seeder;

class ClientesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome' => 'José Albernaz',
            'nif' => 225401234,
            'email' => 'albernaz@w.com',
            'contacto' =>'232460006',
            'telemovel' =>'961234567',
            'morada' =>'Rua XPTO',
            'pais' =>'Portugal',
            'cidade' =>'Viseu',
            'dataentrada' =>'2020/05/01',
            'foto' =>'DefaultImage.jpg',
            'Vendedor' =>'Pedro',
        ]);
    }
}
