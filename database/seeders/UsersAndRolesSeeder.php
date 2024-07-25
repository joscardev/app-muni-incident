<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        $editArticles = Permission::firstOrCreate(['name' => 'edit articles']);
        $publishArticles = Permission::firstOrCreate(['name' => 'publish articles']);
        $deleteArticles = Permission::firstOrCreate(['name' => 'delete articles']);

        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $writerRole = Role::firstOrCreate(['name' => 'writer']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo([$editArticles, $publishArticles, $deleteArticles]);
        $editorRole->givePermissionTo([$editArticles, $publishArticles]);
        $writerRole->givePermissionTo($editArticles);

        // Crear usuarios y asignar roles
        $user1 = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => Hash::make('password')]
        );
        $user1->assignRole('admin');

        $user2 = User::updateOrCreate(
            ['email' => 'editor@example.com'],
            ['name' => 'Editor User', 'password' => Hash::make('password')]
        );
        $user2->assignRole('editor');

        $user3 = User::updateOrCreate(
            ['email' => 'writer@example.com'],
            ['name' => 'Writer User', 'password' => Hash::make('password')]
        );
        $user3->assignRole('writer');
    }
}
