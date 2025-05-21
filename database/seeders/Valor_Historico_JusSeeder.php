<?php

namespace Database\Seeders;

use App\Models\Valor_Historico_Jus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Valor_Historico_JusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<5; $i++){
            Valor_Historico_Jus::factory()->create();
        }
    }
}
