<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Valor_Historico_Jus>
 */
class Valor_Historico_JusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "fecha_desde" => fake()->date('Y-m-d H:i:s'),
            "valor_JUS"=> fake()->randomFloat(2, 0, 9999),
        ];
    }
}
