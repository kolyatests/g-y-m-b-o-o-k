<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\UserGenerator;
use Tests\TestCase;
use URL;


class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testViewRegisterPageUnAuthenticationUser(): void
    {
        $this->get(route('register.form'))
            ->assertStatus(200)
            ->assertViewIs('register')
            ->assertSee('login')
            ->assertSee('register')
            ->assertDontSeeText('register555');
    }

    public function testViewRegisterPageAuthenticationUser(): void
    {
        $user = UserGenerator::getUser();
        $response = $this->actingAs($user)
            ->get(route('register.form'))
            ->assertStatus(302);
        $response->assertRedirect(route('sport.main'));
    }

    public function testRegisterNewUserSuccess(): void
    {
        $user = factory(User::class)->make();
        $response = $this->post(
            route('register', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '$2y$10$.PLT0/FpPRTDX3TPhtnGjegGsN5fLpqTjtKVnAgfvuWlAVTevW41C',
                ]));
        $response->assertStatus(302)
            ->assertRedirect(route('start'))
            ->assertSessionHas('success', 'Check your email and click on the link to verify.');
        $this->assertDatabaseHas('users', [
            'name' => $user->name
            ]);
    }

    public function testRegisterOldUserErrors(): void
    {
        $user = UserGenerator::getUser();
        $response = $this->post(
            route( 'register', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '$2y$10$.PLT0/FpPRTDX3TPhtnGjegGsN5fLpqTjtKVnAgfvuWlAVTevW41C',
                ]));
        $response->assertStatus(302)
            ->assertSessionHasErrors(['email']);
    }

    public function testRegisterNewUserErrors(): void
    {
        $response = $this->post(
            route( 'register', [
                'name' => '',
                'email' => '',
                'password' => '',
                ]));
        $response->assertStatus(302)
            ->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function testViewLoginPageUnAuthenticationUser(): void
    {
        $this->get(route('login'))
            ->assertStatus(200)
            ->assertViewIs('welcome')
            ->assertSee('login')
            ->assertSee('register')
            ->assertDontSeeText('register555');
    }

    public function testViewLoginPageAuthenticationUser(): void
    {
        $user = UserGenerator::getUser();
        $response = $this->actingAs($user)
            ->get(route('login'))
            ->assertStatus(302);
        $response
            ->assertRedirect(route('sport.main'));
    }

    public function testLoginUserSuccess(): void
    {
        $user = UserGenerator::getUser();
        $response = $this->post(route('login.post', [
            'email' => $user->email,
            'password' => '$2y$10$.PLT0/FpPRTDX3TPhtnGjegGsN5fLpqTjtKVnAgfvuWlAVTevW41C',
            ]));
        $response
            ->assertStatus(302)
            ->assertRedirect(route('start'));
    }

    public function testLoginUserErrors(): void
    {
        $response = $this->post(route('login.post', [
            'email' => '',
            'password' => '',
            ]));
        $response
            ->assertStatus(302)
            ->assertSessionHasErrors(['email', 'password']);
    }

    public function testLoginUserNameErrors(): void
    {
        $user = UserGenerator::getUser();
        $response = $this->post(route('login.post', [
            'email' => $user->email . 666666,
            'password' => '12345',
            ]));
        $response->assertSessionHasErrors('alert', 'Incorrect login or password!!');
    }

    public function testLogout(): void
    {
        $user = UserGenerator::getUser();
        $this->actingAs($user)
            ->get(route('logout'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testVerifyEmailSuccess(): void
    {
        $user = UserGenerator::getUser();
        $path = URL::temporarySignedRoute('verifyEmail', now()->addHour(), ['email' => $user->email, 'user' => $user->id]);
        $response = $this->get($path);
        $response
            ->assertStatus(302)
            ->assertRedirect(route('sport.main'));
    }

    public function testVerifyEmailIncorrect(): void
    {
        $user = UserGenerator::getUser();
        $path = URL::temporarySignedRoute('verifyEmail', now()->addHour(), ['email' => $user->email, 'user' => $user->id]);
        $response = $this->get($path . 666666);
        $response->assertStatus(403);
    }
}
