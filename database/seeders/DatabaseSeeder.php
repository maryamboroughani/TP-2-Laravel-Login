<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run RoleAndPermissionsSeeder first
        $this->call(RoleAndPermissionsSeeder::class);
    
        // Check if the test user already exists
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'test@example.com'], // Search condition
            [ // Attributes to create if user doesn't exist
                'name' => 'Test User',
                'password' => bcrypt('password'), // Provide a default password
            ]
        );
    
        // Assign the 'Admin' role to the user
        if (!$user->hasRole('Admin')) {
            $user->assignRole('Admin');
        }
    
        $this->command->info('Database seeded successfully!');
    }
    
}
