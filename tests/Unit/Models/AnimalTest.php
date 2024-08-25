<?php

namespace Tests\Unit;

use App\Models\Animal;
use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase
{
    /**
     * Test if an animal can be created successfully.
     *
     * @return void
     */
    public function test_animal_can_be_created()
    {
        $animal = new Animal();
        $animal->prenom = 'Simba';
        $animal->etat = 'Healthy';
        $animal->race_id = 1; // Assurez-vous que ce race_id existe dans votre base de données

        $this->assertEquals('Simba', $animal->prenom);
        $this->assertEquals('Healthy', $animal->etat);
        $this->assertEquals(1, $animal->race_id);
    }

    /**
     * Test if an animal belongs to a race.
     *
     * @return void
     */
        
    
     public function test_animal_belongs_to_race()
     {
         // Créer une race
         $race = \App\Models\Race::create(['name' => 'Lion']);
     
         // Créer un animal appartenant à cette race
         $animal = \App\Models\Animal::create([
             'prenom' => 'Simba',
             'etat' => 'Healthy',
             'race_id' => $race->id
         ]);
     
         // Charger l'animal avec sa relation race
         $animal = Animal::with('race')->find($animal->id);
     
         // Tester si l'animal appartient bien à la race
         $this->assertEquals('Lion', $animal->race->name);
     }
     
}

