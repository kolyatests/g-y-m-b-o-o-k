<?php

namespace Tests\Feature\Http\Controllers\Admin\other;

use App\Models\Sport\Difficulty;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Generator\DataGenerator;
use Tests\Generator\UserGenerator;
use Tests\TestCase;

class DifficultyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->get(route('admin.difficulties.index'))
            ->assertStatus(200)
            ->assertSee('code');
    }

    public function testCreate()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        DataGenerator::createLangs();
        $this->actingAs($admin)
            ->get(route('admin.difficulties.create'))
            ->assertStatus(200)
            ->assertSee('English');
    }

    public function testStore()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.difficulties.store', DataGenerator::getDataForAdmin()))
            ->assertStatus(302)
            ->assertRedirect(route('admin.difficulties.index'));
        $this->assertDatabaseHas('sport_difficulties', [
            'name' => 'eng'
        ]);
    }

    public function testStoreErrors()
    {
        $admin = UserGenerator::getUser(User::ADMIN);
        $this->actingAs($admin)
            ->post(route('admin.difficulties.store', DataGenerator::getDataForAdminWrong()))
            ->assertStatus(302)
            ->assertSessionHasErrors(['title.spa', 'title.por']);
    }

    public function testEdit()
    {
        DataGenerator::editDataForAdmin(new Difficulty());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Difficulty::first();
        $this->actingAs($admin)
            ->get(route('admin.difficulties.edit', $data->code))
            ->assertStatus(200)
            ->assertSee($data->name);
    }

    public function testUpdate()
    {
        DataGenerator::editDataForAdmin(new Difficulty());
        $admin = UserGenerator::getUser(User::ADMIN);
        $data = Difficulty::first();
        $this->actingAs($admin)
            ->put(route('admin.difficulties.update', [
                $data->code,
                'title' => DataGenerator::updateDataForAdmin(new Difficulty())
            ] ))
            ->assertStatus(302)
            ->assertRedirect(route('admin.difficulties.index'))
        ;
        $this->assertDatabaseHas('sport_difficulties', [
            'name' => Difficulty::first()->name
        ]);
        $this->assertFalse($data->name == Difficulty::first()->name);
    }





}
