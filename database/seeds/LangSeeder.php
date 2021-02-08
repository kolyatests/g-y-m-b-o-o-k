<?php

use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['code' => 'eng', 'name' => 'English'],
            ['code' => 'rus', 'name' => 'Русский'],
            ['code' => 'deu', 'name' => 'Deutsch'],
            ['code' => 'spa', 'name' => 'Español'],
            ['code' => 'por', 'name' => 'Português'],

        ];
        DB::table('sport_langs')->insert($data);
    }
}
