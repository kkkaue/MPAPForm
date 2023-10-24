<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargos')->insert([
            'nome' => 'Estagiário de Direito - CAVINP',
        ]);
        DB::table('cargos')->insert([
            'nome' => 'Assistente Administrativo - CAVINP',
        ]);
        DB::table('cargos')->insert([
            'nome' => 'Assessor Jurídico - CAVINP',
        ]);
        DB::table('cargos')->insert([
            'nome' => 'Assistente Social - CAVINP',
        ]);
        DB::table('cargos')->insert([
            'nome' => 'Pedagogo(a) - CAVINP',
        ]);
        DB::table('cargos')->insert([
            'nome' => 'Psicólogo(a) - CAVINP',
        ]);
    }
}
