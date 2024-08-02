<?php

namespace Database\Seeders;

use App\Models\estadoIncidencia;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoIncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de ejemplo para los estados de incidencias
        estadoIncidencia::insert([
            ['nombre' => 'Pendiente', 'created_at' => Carbon::now()],
            ['nombre' => 'En Progreso', 'created_at' => Carbon::now()],
            ['nombre' => 'Resuelta', 'created_at' => Carbon::now()],
            ['nombre' => 'Cerrada', 'created_at' => Carbon::now()],
            ['nombre' => 'Cancelada', 'created_at' => Carbon::now()],
        ]);
    }
}
