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
            ['nombre' => 'Baja', 'created_at' => Carbon::now()],
            ['nombre' => 'Media', 'created_at' => Carbon::now()],
            ['nombre' => 'Alta', 'created_at' => Carbon::now()],
            ['nombre' => 'Urgente', 'created_at' => Carbon::now()],

        ]);
    }
}
