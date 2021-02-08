<?php

use Illuminate\Database\Seeder;

class DescDifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '1', 'lang' => 'rus', 'name' => 'Легкая'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'Easy'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'einfach'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'Fácil'],
            ['code' => '1', 'lang' => 'por', 'name' => 'Fácil'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'Средняя'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Medium'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'mittel'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'Intermediario'],
            ['code' => '2', 'lang' => 'por', 'name' => 'Médio'],
            ['code' => '3', 'lang' => 'rus', 'name' => 'Тяжелая'],
            ['code' => '3', 'lang' => 'eng', 'name' => 'High'],
            ['code' => '3', 'lang' => 'deu', 'name' => 'schwer'],
            ['code' => '3', 'lang' => 'spa', 'name' => 'Difícil'],
            ['code' => '3', 'lang' => 'por', 'name' => 'Difícil'],

        ];
        DB::table('sport_desc_difficulties')->insert($data);
    }
}
