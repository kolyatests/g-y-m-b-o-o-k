<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['menu_id' => '1', 'img' => 'menu_categ_1'],
            ['menu_id' => '2', 'img' => 'menu_categ_2'],
            ['menu_id' => '4', 'img' => 'menu_categ_4'],
            ['menu_id' => '9', 'img' => 'menu_categ_9'],
            ['menu_id' => '3', 'img' => 'menu_categ_3'],
            ['menu_id' => '7', 'img' => 'menu_categ_7'],
            ['menu_id' => '5', 'img' => 'menu_categ_5'],
            ['menu_id' => '10', 'img' => 'menu_categ_10'],
            ['menu_id' => '11', 'img' => 'menu_categ_11'],
            ['menu_id' => '12', 'img' => 'menu_categ_12'],
            ['menu_id' => '13', 'img' => 'menu_categ_13'],
            ['menu_id' => '14', 'img' => 'menu_categ_14'],
            ['menu_id' => '15', 'img' => 'menu_categ_15'],
            ['menu_id' => '16', 'img' => 'menu_categ_16'],
            ['menu_id' => '17', 'img' => 'menu_categ_17'],
            ['menu_id' => '18', 'img' => 'menu_categ_18'],
            ['menu_id' => '19', 'img' => 'menu_categ_19'],
            ['menu_id' => '20', 'img' => 'menu_categ_20'],

        ];
        DB::table('sport_menus')->insert($data);
    }
}
