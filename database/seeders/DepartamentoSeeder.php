<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departamento::insert([
            ['name' => 'Recursos Humanos', 'descripcion' => 'Gestiona el personal y los recursos humanos de la municipalidad.'],
            ['name' => 'Finanzas', 'descripcion' => 'Administra los recursos financieros y contables de la municipalidad.'],
            ['name' => 'Tecnología de la Información', 'descripcion' => 'Soporte y gestión de los sistemas informáticos y redes.'],
            ['name' => 'Obras Públicas', 'descripcion' => 'Planificación y ejecución de obras públicas y mantenimiento de infraestructuras.'],
            ['name' => 'Seguridad Ciudadana', 'descripcion' => 'Velar por la seguridad y el orden público en el municipio.'],
        ]);
    }
}
