<?php

use Illuminate\Database\Seeder;

class UserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilizadores')->insert([
            'nome' => 'Pedro22',
            'nomeutilizador' => 'ppereira2',
            'email' => 'p2@w.com',
            'password' => Hash::make('123456'),
            'pais' => 'Portugal',
            'datanascimento' => '1990/09/05',
            'foto' => 'asd',
            'tipo' => 1,

        ]);
    }
}
