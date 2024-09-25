<?php

namespace Database\Factories;

use App\Models\TipoVacina;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoteVacina>
 */
class LoteVacinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::ulid(),
            'tipo_vacina_id' => TipoVacina::inRandomOrder()->first()->id ?? TipoVacina::factory()->create()->id,
            'data_validade' => $this->faker->dateTimeBetween('-5 years', '+5 years'),
            'lote' => strtoupper(Str::random(10)),
            'dose_unica' => false,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
