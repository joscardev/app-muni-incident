<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoriaIncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Datos de ejemplo para las categorías de incidencias
        $categorias = [
            ['nombre' => 'Mantenimiento', 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Soporte Técnico', 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Infraestructura', 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Operativo',  'created_at' => $now, 'updated_at' => $now],
        ];

        // Insertar los datos en la tabla categoria_incidencias
        DB::table('categoria_incidencias')->insert($categorias);
    }
}
