<?php

namespace Database\Seeders;

use App\Models\Asistente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsistenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<6; $i++){
            Asistente::factory()->create();
        }
    }
}
