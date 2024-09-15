<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str; // Ajoutez cette ligne pour utiliser Str

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the admin role if it doesn't exist
        $employeRole = Role::firstOrCreate(['label' => 'employe']);
        ;
        // Create the admin user if it doesn't exist
        $employeUser = User::firstOrCreate([
            'name' => 'bob',
            'email' => 'bob@arcadia.fr',
            'password' => bcrypt('Maboule35!'),
            'role_id' => $employeRole->id, // Utilisez l'ID du rôle admin créé
            'remember_token' => Str::random(10), // Ajoutez remember_token
            'email_verified_at' => now(), // Ajoutez email_verified_at avec l'horodatage actuel
        ]);
    }
}