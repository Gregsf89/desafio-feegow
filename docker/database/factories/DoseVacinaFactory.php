<?php

namespace Database\Factories;

use App\Models\Funcionario;
use App\Models\LoteVacina;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoseVacina>
 */
class DoseVacinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf_funcionario' => Funcionario::make()->cpf,
            'id_lote_vacina' => LoteVacina::make()->id,
            'data_aplicacao' => $this->faker->date('Y-m-d', '-5 years'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
