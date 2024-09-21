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
            'id_tipo_vacina' => TipoVacina::make()->id,
            'validade' => $this->faker->date(),
            'lote' => Str::random(10),
            'dose_unica' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
