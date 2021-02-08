<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\DescEquipment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\Generator\UserGenerator;
use Tests\TestCase;


class DescEquipmentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.desc_equipment.index'))
            ->assertStatus(200)
            ->assertSee('code');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.desc_equipment.create'))
            ->assertStatus(200)
            ->assertSee('English')
        ;
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.desc_equipment.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.desc_equipment.index'));
        $this->assertDatabaseHas('sport_desc_equipment', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.desc_equipment.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }

    public function testEdit()
    {
        DataGenerator::editDataForAdmin(new DescEquipment());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = DescEquipment::first();
        $this->actingAs($admin)
            ->get(route('admin.desc_equipment.edit', $data->code))
            ->assertStatus(200)
            ->assertSee($data->name);
    }

    public function testUpdate()
    {
        DataGenerator::editDataForAdmin(new DescEquipment());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = DescEquipment::first();
        $this->actingAs($admin)
            ->put(route('admin.desc_equipment.update', [
                $data->code,
                'title' => DataGenerator::updateDataForAdmin(new DescEquipment())
             ] ))
            ->assertStatus(302)
            ->assertRedirect(route('admin.desc_equipment.index'))
        ;
        $this->assertDatabaseHas('sport_desc_equipment', [
            'name' => DescEquipment::first()->name
        ]);
        $this->assertFalse($data->name == DescEquipment::first()->name);
    }



}
