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
        // create user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@muni.com',
            'password' => Hash::make('verano2080'),
        ]);

        // assign role to user
        $role = Role::findByName('Administrador');
        $user->assignRole($role);

        
    }
}
