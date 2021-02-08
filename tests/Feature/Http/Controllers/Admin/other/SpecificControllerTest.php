<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\Specific;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\TestCase;
use Tests\Generator\UserGenerator;

class SpecificControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.specifics.index'))
            ->assertStatus(200)
            ->assertSee('specific');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.specifics.create'))
            ->assertStatus(200)
            ->assertSee('English');
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.specifics.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.specifics.index'));
        $this->assertDatabaseHas('sport_specifics', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.specifics.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }

    public function testEdit()
    {
        DataGenerator::editDataForAdmin(new Specific());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Specific::first();
        $this->actingAs($admin)
            ->get(route('admin.specifics.edit', $data->code))
            ->assertStatus(200)
            ->assertSee($data->name);
    }

    public function testUpdate()
    {
        DataGenerator::editDataForAdmin(new Specific());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Specific::first();
        $this->actingAs($admin)
            ->put(route('admin.specifics.update', [
                $data->code,
                'title' => DataGenerator::updateDataForAdmin(new Specific())
            ] ))
            ->assertStatus(302)
            ->assertRedirect(route('admin.specifics.index'));
        $this->assertDatabaseHas('sport_specifics', [
            'name' => Specific::first()->name
        ]);
        $this->assertFalse($data->name == Specific::first()->name);
    }


}
