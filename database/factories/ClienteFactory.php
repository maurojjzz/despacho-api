<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre"=> fake()->firstName(),
            "apellido"=> fake()->lastName(),
            "dni"=> fake()->unique()->numerify('########'),
            "email"=> fake()->unique()->safeEmail(),
            "fecha_nacimiento"=> fake()->date(),
            "telefono"=> fake()->phoneNumber(),
            "domicilio"=> fake()->address(),
        ];
    }
}
