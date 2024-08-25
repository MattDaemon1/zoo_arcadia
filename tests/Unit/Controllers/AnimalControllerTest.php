<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Animal;
use App\Models\Race;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnimalControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_animals()
    {
        $animal = Animal::factory()->create();

        $response = $this->get(route('animals.index'));

        $response->assertStatus(200);
        $response->assertViewIs('animal.index');
        $response->assertSee($animal->prenom);
    }

    /** @test */
    public function it_can_display_the_create_form()
    {
        $response = $this->get(route('animals.create'));

        $response->assertStatus(200);
        $response->assertViewIs('animal.create');
    }

    /** @test */
    public function it_can_store_a_new_animal()
    {
        $race = Race::factory()->create();

        $animalData = [
            'prenom' => 'Simba',
            'etat' => 'En bonne santé',
            'race_id' => $race->id,
        ];

        $response = $this->post(route('animals.store'), $animalData);

        $this->assertDatabaseHas('animals', $animalData);
        $response->assertRedirect(route('animals.index'));
        $response->assertSessionHas('success', 'Animal created successfully.');
    }

    /** @test */
    public function it_can_display_the_edit_form()
    {
        $animal = Animal::factory()->create();

        $response = $this->get(route('animals.edit', $animal->id));

        $response->assertStatus(200);
        $response->assertViewIs('animal.edit');
        $response->assertSee($animal->prenom);
    }

    /** @test */
    public function it_can_update_an_animal()
    {
        $animal = Animal::factory()->create();
        $newData = [
            'prenom' => 'Nala',
            'etat' => 'En très bonne santé',
            'race_id' => $animal->race_id,
        ];

        $response = $this->put(route('animals.update', $animal->id), $newData);

        $this->assertDatabaseHas('animals', $newData);
        $response->assertRedirect(route('animals.index'));
        $response->assertSessionHas('success', 'Animal updated successfully');
    }

    /** @test */
    public function it_can_delete_an_animal()
    {
        $animal = Animal::factory()->create();

        $response = $this->delete(route('animals.destroy', $animal->id));

        $this->assertDatabaseMissing('animals', ['id' => $animal->id]);
        $response->assertRedirect(route('animals.index'));
        $response->assertSessionHas('success', 'Animal deleted successfully');
    }
}
