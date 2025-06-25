<?php

namespace Database\Seeders;

use App\Models\CasoJudicial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasoJudicialSeeder extends Seeder
{
    public function run(): void
    {
        for($i=0; $i<20; $i++){
            CasoJudicial::factory()->create();
        }
    }
}
