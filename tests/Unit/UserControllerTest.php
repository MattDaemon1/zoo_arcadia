<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Create roles
        Role::create(['label' => 'admin']);
        Role::create(['label' => 'veterinaire']);
        Role::create(['label' => 'employe']);
    }

    /** @test */
    public function it_can_display_a_list_of_users()
    {
        // Create some users
        User::factory()->count(3)->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewHas('users');
    }

    /** @test */
    public function it_can_display_the_create_form()
    {
        $response = $this->get(route('users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('user.form');
        $response->assertViewHas('roles');
    }

    /** @test */
    public function it_can_store_a_new_user()
    {
        $data = [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => Role::first()->id,
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'newuser@example.com']);
    }

    /** @test */
    public function it_can_display_the_edit_form()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', $user->id));

        $response->assertStatus(200);
        $response->assertViewIs('user.edit');
        $response->assertViewHas('user', $user);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'role_id' => $user->role_id,
        ];

        $response = $this->put(route('users.update', $user->id), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'updated@example.com']);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}

