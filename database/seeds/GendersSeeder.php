<?php

use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '1', 'lang' => 'rus', 'name' => 'Мужчин'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'Man'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'Männer'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'Hombre'],
            ['code' => '1', 'lang' => 'por', 'name' => 'Homem'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'Женщин'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Woman'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'Frauen'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'Mujer'],
            ['code' => '2', 'lang' => 'por', 'name' => 'Mulher'],
            ['code' => '3', 'lang' => 'rus', 'name' => 'Мужчин и Женщин'],
            ['code' => '3', 'lang' => 'eng', 'name' => 'Man & Woman'],
            ['code' => '3', 'lang' => 'deu', 'name' => 'Männer und Frauen'],
            ['code' => '3', 'lang' => 'spa', 'name' => 'Hombre & Mujer'],
            ['code' => '3', 'lang' => 'por', 'name' => 'Homem & Mulher'],

        ];
        DB::table('sport_genders')->insert($data);
    }
}
