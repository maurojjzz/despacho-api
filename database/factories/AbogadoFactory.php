<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Abogado>
 */
class AbogadoFactory extends Factory
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
            "nombre"=> fake()->firstName(),
            "apellido"=> fake()->lastName(),
            "matricula"=> fake()->unique()->numerify('########'),
            "email"=> fake()->unique()->safeEmail(),
            "password"=> static::$password ??= Hash::make('password'),
            "fecha_nacimiento"=> fake()->date(),
            "telefono"=> fake()->phoneNumber(),
            "domicilio"=> fake()->address(),
            "especialidad"=> fake()->jobTitle(),
        ];
    }
}
