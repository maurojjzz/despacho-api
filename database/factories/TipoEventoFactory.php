<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoEvento>
 */
class TipoEventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => fake()->unique()->randomElement([
                'Audiencia preliminar',
                'Citacion judicial',
                'Reunión con cliente',
                'Mediacion',
                'Presentación de escritos',
                'Control de pruebas',
                'Vista de causa',
                'Firma de documentos',
                'Notificacion',
                'Juicio oral',
            ]),
            'cantidad_JUS' => fake()->numberBetween(1, 100),
        ];
    }
}
