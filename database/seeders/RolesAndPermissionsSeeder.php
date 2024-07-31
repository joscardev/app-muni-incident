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
    public function run(): void
    {
        // Crear permisos
        $editArticles = Permission::create(['name' => 'edit articles']);
        $publishArticles = Permission::create(['name' => 'publish articles']);
        $deleteArticles = Permission::create(['name' => 'delete articles']);

        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $writerRole = Role::create(['name' => 'writer']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo([$editArticles, $publishArticles, $deleteArticles]);
        $editorRole->givePermissionTo([$editArticles, $publishArticles]);
        $writerRole->givePermissionTo($editArticles);

    }
}
