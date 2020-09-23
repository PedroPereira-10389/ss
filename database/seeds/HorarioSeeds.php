<?php

use Illuminate\Database\Seeder;

class HorarioSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios')->insert([
            'idfuncionario' => 1,
            'datainicio' => '2020/09/20',
            'datafim' => '2020/09/24',
            'horainicio' => '09:00',
            'horafim' => '11:00',
        ]);

    }
}
