<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Crear permisos
        $permissions = [
            'crear-incidencias',
            'ver-incidencias',
            'actualizar-incidencias',
            'eliminar-incidencias',
            'asignar-incidencias',
            'cambiar-estatus-incidencia',
            'crear-categorias',
            'ver-categorias',
            'actualizar-categorias',
            'eliminar-categorias',
            'crear-prioridades',
            'ver-prioridades',
            'actualizar-prioridades',
            'eliminar-prioridades',
            'crear-estados',
            'ver-estados',
            'actualizar-estados',
            'eliminar-estados',
            'crear-usuarios',
            'ver-usuarios',
            'actualizar-usuarios',
            'eliminar-usuarios',
            'crear-roles',
            'ver-roles',
            'actualizar-roles',
            'eliminar-roles',
            'asignar-roles',
            'crear-comentarios',
            'ver-comentarios',
            'generar-reportes',
            'ver-reportes',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles
        $roles = [
            'Administrador' => [
                'crear-incidencias',
                'ver-incidencias',
                'actualizar-incidencias',
                'eliminar-incidencias',
                'asignar-incidencias',
                'cambiar-estatus-incidencia',
                'crear-categorias',
                'ver-categorias',
                'actualizar-categorias',
                'eliminar-categorias',
                'crear-prioridades',
                'ver-prioridades',
                'actualizar-prioridades',
                'eliminar-prioridades',
                'crear-estados',
                'ver-estados',
                'actualizar-estados',
                'eliminar-estados',
                'crear-usuarios',
                'ver-usuarios',
                'actualizar-usuarios',
                'eliminar-usuarios',
                'crear-roles',
                'ver-roles',
                'actualizar-roles',
                'eliminar-roles',
                'asignar-roles',
                'crear-comentarios',
                'ver-comentarios',
                'generar-reportes',
                'ver-reportes',
            ],
            'Gestor de Incidencias' => [
                'crear-incidencias',
                'ver-incidencias',
                'actualizar-incidencias',
                'eliminar-incidencias',
                'asignar-incidencias',
                'cambiar-estatus-incidencia',
                'crear-categorias',
                'ver-categorias',
                'actualizar-categorias',
                'eliminar-categorias',
                'crear-prioridades',
                'ver-prioridades',
                'actualizar-prioridades',
                'eliminar-prioridades',
                'crear-estados',
                'ver-estados',
                'actualizar-estados',
                'eliminar-estados',
                'generar-reportes',
                'ver-reportes',
            ],
            'Técnico de Soporte' => [
                'ver-incidencias',
                'actualizar-incidencias',
                'cambiar-estatus-incidencia',
                'crear-comentarios',
                'ver-comentarios',
            ],
            'Usuario Final' => [
                'crear-incidencias',
                'ver-incidencias',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->givePermissionTo($rolePermissions);
        }
    }
}
