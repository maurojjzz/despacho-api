<?php

namespace Database\Seeders;

use App\Models\Abogado;
use App\Models\Agenda;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abogados = Abogado::all();

        foreach ($abogados as $abogado) {

            $numAgendas = fake()->numberBetween(0, 3);

            for ($i = 0; $i < $numAgendas; $i++) {
                Agenda::factory()->create([
                    'abogado_id' => $abogado->id
                ]);
            }

        }
    }
}
