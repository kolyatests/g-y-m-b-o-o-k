<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\Muscles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\TestCase;
use Tests\Generator\UserGenerator;

class MuscleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.muscles.index'))
            ->assertStatus(200)
            ->assertSee('code');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.muscles.create'))
            ->assertStatus(200)
            ->assertSee('English');
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.muscles.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.muscles.index'));
        $this->assertDatabaseHas('sport_muscles', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.muscles.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }

    public function testEdit()
    {
        DataGenerator::editDataForAdmin(new Muscles());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Muscles::first();
        $this->actingAs($admin)
            ->get(route('admin.muscles.edit', $data->code))
            ->assertStatus(200)
            ->assertSee($data->name);
    }

    public function testUpdate()
    {
        DataGenerator::editDataForAdmin(new Muscles());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Muscles::first();
        $this->actingAs($admin)
            ->put(route('admin.muscles.update', [
                $data->code,
                'title' => DataGenerator::updateDataForAdmin(new Muscles())
            ] ))
            ->assertStatus(302)
            ->assertRedirect(route('admin.muscles.index'));
        $this->assertDatabaseHas('sport_muscles', [
            'name' => Muscles::first()->name
        ]);
        $this->assertFalse($data->name == Muscles::first()->name);
    }





}
