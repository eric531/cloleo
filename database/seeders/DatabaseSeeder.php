<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ✅ Création des rôles (évite les doublons)
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $clientRole = Role::firstOrCreate(['name' => 'client', 'guard_name' => 'web']);

        // ✅ Liste des permissions
        $permissions = [
            'products.index', 'products.show', 'products.create', 'products.edit', 'products.destroy',
            'categories.index', 'categories.show', 'categories.create', 'categories.edit', 'categories.destroy',
            'orders.index', 'orders.show', 'orders.update',
            'users.index', 'users.show', 'users.edit', 'users.destroy',
            'pubs.index', 'pubs.show', 'pubs.create', 'pubs.edit', 'pubs.destroy',
        ];

        // ✅ Création des permissions si elles n'existent pas
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // ✅ Assignation des permissions aux rôles
        $adminRole->syncPermissions($permissions);
        $clientRole->syncPermissions(['products.index', 'products.show', 'categories.index', 'categories.show']);

        // ✅ Création des utilisateurs avec rôles
        $admin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $client = User::firstOrCreate([
            'email' => 'client@client.com',
        ], [
            'name' => 'Client',
            'password' => Hash::make('password'),
        ]);
        $client->assignRole('client');
    }
}

