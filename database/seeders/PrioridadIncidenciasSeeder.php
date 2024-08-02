<?php

namespace Database\Seeders;

use App\Models\prioridadIncidencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PrioridadIncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        prioridadIncidencia::insert([
            ['nombre' => 'Pendiente', 'created_at' => Carbon::now()],
            ['nombre' => 'En Progreso', 'created_at' => Carbon::now()],
            ['nombre' => 'Resuelta', 'created_at' => Carbon::now()],
            ['nombre' => 'Cerrada', 'created_at' => Carbon::now()],
            ['nombre' => 'Cancelada', 'created_at' => Carbon::now()],
        ]);
    }
}
