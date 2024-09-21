<?php

namespace Database\Factories;

use App\Models\Funcionario;
use App\Models\LoteVacina;
use App\Models\TipoVacina;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comorbidade>
 */
class ComorbidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'nome' => $this->faker->word(),

        ];
    }
}
