<?php

namespace Database\Seeders;

use App\Models\Abogado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbogadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i=0; $i<30; $i++){
            Abogado::factory()->create();
        }

    }
}
