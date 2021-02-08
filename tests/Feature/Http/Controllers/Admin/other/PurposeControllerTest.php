<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\Purpose;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\TestCase;
use Tests\Generator\UserGenerator;

class PurposeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.purposes.index'))
            ->assertStatus(200)
            ->assertSee('purpose');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.purposes.create'))
            ->assertStatus(200)
            ->assertSee('English');
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.purposes.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.purposes.index'));
        $this->assertDatabaseHas('sport_purposes', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.purposes.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }

    public function testEdit()
    {
        DataGenerator::editDataForAdmin(new Purpose());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Purpose::first();
        $this->actingAs($admin)
            ->get(route('admin.purposes.edit', $data->code))
            ->assertStatus(200)
            ->assertSee($data->name);
    }

    public function testUpdate()
    {
        DataGenerator::editDataForAdmin(new Purpose());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Purpose::first();
        $this->actingAs($admin)
            ->put(route('admin.purposes.update', [
                $data->code,
                'title' => DataGenerator::updateDataForAdmin(new Purpose())
            ] ))
            ->assertStatus(302)
            ->assertRedirect(route('admin.purposes.index'));
        $this->assertDatabaseHas('sport_purposes', [
            'name' => Purpose::first()->name
        ]);
        $this->assertFalse($data->name == Purpose::first()->name);
    }




}
