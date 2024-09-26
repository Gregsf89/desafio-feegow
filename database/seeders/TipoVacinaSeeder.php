<?php

namespace Database\Seeders;

use App\Models\TipoVacina;
use Illuminate\Database\Seeder;

class TipoVacinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoVacina::firstOrCreate(['nome' => 'Coronavac']);
        TipoVacina::firstOrCreate(['nome' => 'Pfizer']);
        TipoVacina::firstOrCreate(['nome' => 'Astrazeneca']);
        TipoVacina::firstOrCreate(['nome' => 'Janssen']);
        TipoVacina::firstOrCreate(['nome' => 'Covaxin']);
        TipoVacina::firstOrCreate(['nome' => 'Sputnik V']);
        TipoVacina::firstOrCreate(['nome' => 'Moderna']);
        TipoVacina::firstOrCreate(['nome' => 'Sinopharm']);
        TipoVacina::firstOrCreate(['nome' => 'Sinovac']);
        TipoVacina::firstOrCreate(['nome' => 'Covovax']);
        TipoVacina::firstOrCreate(['nome' => 'Covishield']);
        TipoVacina::firstOrCreate(['nome' => 'Abdala']);
        TipoVacina::firstOrCreate(['nome' => 'Soberana Plus']);
        TipoVacina::firstOrCreate(['nome' => 'Soberana 01']);
        TipoVacina::firstOrCreate(['nome' => 'Soberana 02']);
        TipoVacina::firstOrCreate(['nome' => 'Soberana 03']);
    }
}
