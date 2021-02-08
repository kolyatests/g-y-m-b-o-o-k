<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\UserGenerator;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testViewPageEditProfileUser()
    {
        $user = UserGenerator::getUser();
        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertStatus(200)
            ->assertViewIs('user.edit')
            ->assertSee($user->first_name);
    }

    public function testUpdateProfileUser()
    {
        $user = UserGenerator::getUser();
        $name = 'NewName';
        $response = $this->actingAs($user)
            ->post(route('profile.update', [
                'first_name' => $name,
            ]));
        $response->assertStatus(302)
            ->assertRedirect(route('profile.update'))
            ->assertSessionHas('success', 'Profile updated successfully');
        $this->assertDatabaseHas('users', [
            'first_name' => $name
        ]);
        $this->get(route('profile.edit'))
            ->assertViewIs('user.edit')
            ->assertSee($name);
    }

    public function testUpdateProfileUserError()
    {
        $user = UserGenerator::getUser();
        $name = '666666';
        $response = $this->actingAs($user)
            ->post(route('profile.update', [
                'first_name' => $name,
            ]));
        $response->assertStatus(302)
            ->assertSessionHasErrors('first_name');
    }

    public function testViewPageProfileUser()
    {
        $user = UserGenerator::getUser();
        $this->actingAs($user)
            ->get(route('profile.show', $user->name))
            ->assertStatus(200)
            ->assertViewIs('user.show')
            ->assertSee($user->name);
    }

    public function testViewPageProfileUserError()
    {
        $user = UserGenerator::getUser();
        $this->actingAs($user)
            ->get(route('profile.show', 666666))
            ->assertStatus(404);
    }

    public function testLoginAsUser()
    {
        $user = UserGenerator::getUser();
        $this->get(route('login.as.user', [$user->email, 1]))
            ->assertStatus(302)
            ->assertRedirect(route('sport.main'));
        $this->assertAuthenticated();
    }
}
