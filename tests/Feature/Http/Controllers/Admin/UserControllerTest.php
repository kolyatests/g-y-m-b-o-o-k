<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Generator\UserGenerator;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $user = UserGenerator::getUser();
        $this->actingAs($admin)
            ->get(route('admin.users.index'))
            ->assertStatus(200)
            ->assertSee($user->name);
    }


}
