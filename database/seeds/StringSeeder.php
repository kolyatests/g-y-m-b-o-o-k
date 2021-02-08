<?php

use Illuminate\Database\Seeder;

class StringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'menu_main', 'lang' => 'rus', 'text' => 'Главная'],
            ['name' => 'menu_main', 'lang' => 'eng', 'text' => 'Main'],
            ['name' => 'menu_main', 'lang' => 'deu', 'text' => 'Startseite'],
            ['name' => 'menu_main', 'lang' => 'spa', 'text' => 'Inicio'],
            ['name' => 'menu_main', 'lang' => 'por', 'text' => 'Principal'],
            ['name' => 'menu_exercise', 'lang' => 'rus', 'text' => 'Упражнения'],
            ['name' => 'menu_exercise', 'lang' => 'eng', 'text' => 'Exercises'],
            ['name' => 'menu_exercise', 'lang' => 'deu', 'text' => 'Übungen'],

            ['name' => 'back1', 'lang' => 'por', 'text' => 'de volta'],
            ['name' => 'menu1', 'lang' => 'rus', 'text' => 'меню'],
            ['name' => 'menu1', 'lang' => 'eng', 'text' => 'menu'],
            ['name' => 'menu1', 'lang' => 'deu', 'text' => 'Speisekarte'],
            ['name' => 'menu1', 'lang' => 'spa', 'text' => 'menú'],
            ['name' => 'menu1', 'lang' => 'por', 'text' => 'cardápio'],

        ];
        DB::table('strings')->insert($data);
    }
}
