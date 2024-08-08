<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create the admin user if it doesn't exist
        $adminUser = User::firstOrCreate([
            'name' => 'José',
            'email' => 'jose@arcadia.fr',
            'password' => bcrypt('Maboule35!'),
        ]);

        // Assign the admin role to the admin user
        $adminUser->roles()->attach($adminRole);
    }
}
