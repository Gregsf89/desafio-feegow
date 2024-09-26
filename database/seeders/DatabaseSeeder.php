<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            TipoVacinaSeeder::class,
            ComorbidadeSeeder::class,
            FuncionarioSeeder::class,
            LotevacinaSeeder::class,
        ];

        $this->call($seeders);
    }
}
