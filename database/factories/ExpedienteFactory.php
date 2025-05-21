<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expediente>
 */
class ExpedienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "formato"=> fake()->word(),
            "fecha_hora_subida" => fake()->date('Y-m-d H:i:s'),
            "url"=> fake()->url(),
        ];
    }
}
