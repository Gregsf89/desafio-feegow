<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funcionario::firstOrCreate([
            'cpf' => '02558444921',
            'nome' => 'Krystina Bahringer Zulauf',
            'data_nascimento' => '1997-09-01'
        ]);
    }
}
