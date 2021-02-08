<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\Genders;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\TestCase;
use Tests\Generator\UserGenerator;

class GenderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.genders.index'))
            ->assertStatus(200)
            ->assertSee('gender');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.genders.create'))
            ->assertStatus(200)
            ->assertSee('English');
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.genders.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.genders.index'));
        $this->assertDatabaseHas('sport_genders', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.genders.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }

    public function testEdit()
    {
        DataGenerator::editDataForAdmin(new Genders());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Genders::first();
        $this->actingAs($admin)
            ->get(route('admin.genders.edit', $data->code))
            ->assertStatus(200)
            ->assertSee($data->name);
    }

    public function testUpdate()
    {
        DataGenerator::editDataForAdmin(new Genders());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Genders::first();
        $this->actingAs($admin)
            ->put(route('admin.genders.update', [
                $data->code,
                'title' => DataGenerator::updateDataForAdmin(new Genders())
            ] ))
            ->assertStatus(302)
            ->assertRedirect(route('admin.genders.index'));
        $this->assertDatabaseHas('sport_genders', [
            'name' => Genders::first()->name
        ]);
        $this->assertFalse($data->name == Genders::first()->name);
    }



}
