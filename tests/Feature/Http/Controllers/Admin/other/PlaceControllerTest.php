<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\Places;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\TestCase;
use Tests\Generator\UserGenerator;

class PlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.places.index'))
            ->assertStatus(200)
            ->assertSee('places');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.places.create'))
            ->assertStatus(200)
            ->assertSee('English');
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.places.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.places.index'));
        $this->assertDatabaseHas('sport_places', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.places.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }


}
