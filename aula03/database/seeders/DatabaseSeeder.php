<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@dev.test',
            'password' => env('APP_ADMIN_PASSWORD', 'adminadmin')
        ]);


        $this->call([
            RegiaoSeeder::class,
            EstadoSeeder::class,
        ]);

        Fornecedor::factory(5)
            ->hasProdutos(10)
            ->create();
    }
}
