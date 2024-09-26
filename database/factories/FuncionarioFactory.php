<?php

namespace Database\Factories;

use App\Http\Helpers\CpfHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf' => CpfHelper::generate(),
            'nome' => $this->faker->name() . ' ' . $this->faker->lastName(),
            'data_nascimento' => $this->faker->date('Y-m-d', '-18 years'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
