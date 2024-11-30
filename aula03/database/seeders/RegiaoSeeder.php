<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegiaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regioes = [
            'Norte',
            'Nordeste',
            'Centro-Oeste',
            'Sudeste',
            'Sul'
        ];

        foreach ($regioes as $regiao) {
            \App\Models\Regiao::create(['nome' => $regiao]);
        }
    }
}
