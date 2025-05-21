<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AgendaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(AbogadoSeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ExpedienteSeeder::class);
        $this->call(Valor_Historico_JusSeeder::class);

    }
}
