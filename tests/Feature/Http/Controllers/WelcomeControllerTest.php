<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\UserGenerator;
use Tests\TestCase;

class WelcomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStartUnAuthenticationUser()
    {
        $response = $this->get(route('start'))->assertStatus(200);
        $response->assertSee('login');
        $response->assertSee('register');
        $response->assertDontSeeText('register555');
    }

    public function testStartAuthenticationUserIsAdmin()
    {
        $user = UserGenerator::getUser(User::ADMIN);
        $response = $this->actingAs($user)->get(route('start'))->assertStatus(200);
        $response->assertDontSeeText('login');
        $response->assertSee('admin');
    }

    public function testStartAuthenticationUserIsNotAdmin()
    {
        $user = UserGenerator::getUser();
        $response = $this->actingAs($user)->get('/')->assertStatus(200);
        $response->assertDontSeeText('admin');
    }
}


