<?php

namespace Database\Factories;

use App\Models\Comorbidade;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComorbidadeFuncionario>
 */
class ComorbidadeFuncionarioFactory extends Factory
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
            'comorbidade_id' => Comorbidade::inRandomOrder()->first()->id,
        ];
    }
}
