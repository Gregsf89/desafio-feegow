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
            'funcionario_cpf' => Funcionario::factory()->create()->cpf,
            'lote_vacina_id' => LoteVacina::factory()->create()->id,
            'data_aplicacao' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'dose' => $this->faker->randomElement(['1', '2', '3']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
