<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'gérer utilisateurs',
            'gérer entrepreneurs',
            'créer service',
            'éditer services',
            'supprimer services',
            'voir statistiques',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::create(['name' => 'Admin']);
        $entrepreneur = Role::create(['name' => 'Entrepreneur']);

        $admin->givePermissionTo(Permission::all());

        $entrepreneur->givePermissionTo([
            'créer services',
            'éditer services',
            'supprimer services',
        ]);
    }
}
