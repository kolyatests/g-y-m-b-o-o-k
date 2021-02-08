<?php

use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '1', 'lang' => 'rus', 'name' => 'Тренажерный зал'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'In the Sport'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'Fitnessstudio'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'En el gimnasio'],
            ['code' => '1', 'lang' => 'por', 'name' => 'Na academia'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'Домашние тренировки'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Home Workouts'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'Heimtrainings'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'Entrenamientos en casa'],
            ['code' => '2', 'lang' => 'por', 'name' => 'Treinos de casa'],

        ];
        DB::table('sport_places')->insert($data);
    }
}
