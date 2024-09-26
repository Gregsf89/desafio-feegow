<?php

namespace Database\Seeders;

use App\Models\LoteVacina;
use Illuminate\Database\Seeder;

class LoteVacinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoteVacina::firstOrCreate([
            'id' => '01J8NBNA2EN17VTBBJMN31AHDY',
            'lote' => 'ACB123QWE',
            'tipo_vacina_id' => 1,
            'data_validade' => '2024-12-12',
            'dose_unica' => false
        ]);
    }
}
