<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Assurez-vous que le Seeder est appelé correctement ici
        $this->call([
            \Database\Seeders\AdminSeeder::class,
        ]);
    }
}
