<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "fecha_hora_inicio"=> fake()->dateTimeBetween('now', '+1 month'),
            "duracion"=> fake()->time(),
            "estado"=> fake()->randomElement(['confirmada', 'cancelada', 'pendiente']),
        ];
    }
}
