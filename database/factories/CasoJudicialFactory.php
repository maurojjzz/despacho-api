<?php

namespace Database\Factories;

use App\Models\CasoJudicial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CasoJudicial>
 */
class CasoJudicialFactory extends Factory
{

    protected $model = CasoJudicial::class;
    
    public function definition(): array
    {
        $fechaHoraCreacion = fake()->dateTimeBetween('-1 year', 'now');
        return [
            "fecha_hora_creacion" => $fechaHoraCreacion->format('Y-m-d H:i:s'),
            "estado_caso" => fake()->boolean(),
            "caso_total" => fake()->randomFloat(2, 0, 9999),
            "fecha_hora_fin" => fake()->dateTimeBetween($fechaHoraCreacion, '+1 year')->format('Y-m-d H:i:s'),
            "cant_total_JUS" =>  fake()->numberBetween(1, 100),
            "estado_pago" => fake()->boolean(),
        ];
    }
}
