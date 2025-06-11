<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asistente>
 */
class AsistenteFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre" => fake()->firstName(),
            "apellido" => fake()->lastName(),
            "email" => fake()->unique()->safeEmail(),
            "usuario" => fake()->userName(),
            "password" => static::$password ??= Hash::make('password'),
            "telefono" => fake()->phoneNumber(),
            "fecha_nacimiento" => fake()->date(),
        ];
    }
}
