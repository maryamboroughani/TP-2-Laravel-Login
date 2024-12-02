<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define Permissions
        $permissions = [
            'create-articles',
            'edit-articles',
            'delete-articles',
            'create-categories',
            'edit-categories',
            'delete-categories',
        ];

        // Create Permissions if they don't already exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define Roles and their Permissions
        $roles = [
            'Admin' => [
                'create-articles',
                'edit-articles',
                'delete-articles',
                'create-categories',
                'edit-categories',
                'delete-categories',
            ],
            'Author' => [
                'create-articles',
                'edit-articles',
                'delete-articles',
            ],
        ];

        // Create Roles and Assign Permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions); // Attach permissions to the role
        }

        $this->command->info('Roles and Permissions have been seeded successfully!');
    }
}
