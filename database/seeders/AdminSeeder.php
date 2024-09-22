<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str; // Ajoutez cette ligne pour utiliser Str

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
        $adminRole = Role::firstOrCreate(['label' => 'admin']);
        ;
        // Create the admin user if it doesn't exist
        $adminUser = User::firstOrCreate([
            'name' => 'José',
            'email' => 'jose@arcadia.fr',
            'password' => bcrypt('Maboule35!'),
            'role_id' => $adminRole->id, // Utilisez l'ID du rôle admin créé
            'remember_token' => Str::random(10), // Ajoutez remember_token
            'email_verified_at' => now(), // Ajoutez email_verified_at avec l'horodatage actuel
        ]);

        $veterinaireRole = Role::firstOrCreate(['label' => 'veterinaire']);
        ;
        // Create the admin user if it doesn't exist
        $veterinaireUser = User::firstOrCreate([
            'name' => 'charles',
            'email' => 'charles@arcadia.fr',
            'password' => bcrypt('Maboule35!'),
            'role_id' => $veterinaireRole->id, // Utilisez l'ID du rôle admin créé
            'remember_token' => Str::random(10), // Ajoutez remember_token
            'email_verified_at' => now(), // Ajoutez email_verified_at avec l'horodatage actuel
        ]);

        

        // Pas besoin d'attacher explicitement le rôle ici puisque vous utilisez 'role_id'
    }
}
