<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\Equipment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\Generator\UserGenerator;
use Tests\TestCase;

class EquipmentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.equipment.index'))
            ->assertStatus(200)
            ->assertSee('equipment');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.equipment.create'))
            ->assertStatus(200)
            ->assertSee('English');
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.equipment.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.equipment.index'));
        $this->assertDatabaseHas('sport_equipment', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.equipment.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }

    public function testEdit()
    {
        DataGenerator::editDataForAdmin(new Equipment());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Equipment::first();
        $this->actingAs($admin)
            ->get(route('admin.equipment.edit', $data->code))
            ->assertStatus(200)
            ->assertSee($data->name);
    }

    public function testUpdate()
    {
        DataGenerator::editDataForAdmin(new Equipment());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Equipment::first();
        $this->actingAs($admin)
            ->put(route('admin.equipment.update', [
                $data->code,
                'title' => DataGenerator::updateDataForAdmin(new Equipment())
            ] ))
            ->assertStatus(302)
            ->assertRedirect(route('admin.equipment.index'));
        $this->assertDatabaseHas('sport_equipment', [
            'name' => Equipment::first()->name
        ]);
        $this->assertFalse($data->name == Equipment::first()->name);
    }

}
