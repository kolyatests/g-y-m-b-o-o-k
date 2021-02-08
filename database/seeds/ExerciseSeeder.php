<?php

use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['exercise_id' => '1', 'menu_id' => '7', 'img_prev' => 'menu_1', 'img' => 'desc_1', 'muscle_first' => '8', 'muscle_second' => '0', 'difficulty' => '1', 'equipment' => '3', 'use_weight' => '1'],
            ['exercise_id' => '2', 'menu_id' => '7', 'img_prev' => 'menu_2', 'img' => 'desc_2', 'muscle_first' => '8', 'muscle_second' => '0', 'difficulty' => '1', 'equipment' => '4', 'use_weight' => '1'],
            ['exercise_id' => '3', 'menu_id' => '2', 'img_prev' => 'menu_3', 'img' => 'desc_3', 'muscle_first' => '2', 'muscle_second' => '8', 'difficulty' => '2', 'equipment' => '3', 'use_weight' => '1'],
            ['exercise_id' => '4', 'menu_id' => '7', 'img_prev' => 'menu_4', 'img' => 'desc_4', 'muscle_first' => '8', 'muscle_second' => '0', 'difficulty' => '1', 'equipment' => '4', 'use_weight' => '1'],
            ['exercise_id' => '5', 'menu_id' => '1', 'img_prev' => 'menu_5', 'img' => 'desc_5', 'muscle_first' => '1', 'muscle_second' => '0', 'difficulty' => '1', 'equipment' => '12', 'use_weight' => '1'],
            ['exercise_id' => '6', 'menu_id' => '1', 'img_prev' => 'menu_6', 'img' => 'desc_6', 'muscle_first' => '1', 'muscle_second' => '0', 'difficulty' => '1', 'equipment' => '12', 'use_weight' => '1'],
            ['exercise_id' => '7', 'menu_id' => '16', 'img_prev' => 'menu_7', 'img' => 'desc_7', 'muscle_first' => '9', 'muscle_second' => '2;3;5;8', 'difficulty' => '2', 'equipment' => '5', 'use_weight' => '0'],

            ['exercise_id' => '467', 'menu_id' => '10', 'img_prev' => 'menu_467', 'img' => 'desc_467', 'muscle_first' => '11', 'muscle_second' => '7;12;13', 'difficulty' => '3', 'equipment' => '1', 'use_weight' => '0'],
            ['exercise_id' => '468', 'menu_id' => '11', 'img_prev' => 'menu_468', 'img' => 'desc_468', 'muscle_first' => '11;12', 'muscle_second' => '13;16', 'difficulty' => '1', 'equipment' => '1', 'use_weight' => '0'],
            ['exercise_id' => '469', 'menu_id' => '3', 'img_prev' => 'menu_469', 'img' => 'desc_469', 'muscle_first' => '6', 'muscle_second' => '0', 'difficulty' => '2', 'equipment' => '1', 'use_weight' => '0'],
            ['exercise_id' => '470', 'menu_id' => '11', 'img_prev' => 'menu_470', 'img' => 'desc_470', 'muscle_first' => '11;12', 'muscle_second' => '13;16', 'difficulty' => '1', 'equipment' => '1', 'use_weight' => '0'],
            ['exercise_id' => '471', 'menu_id' => '10', 'img_prev' => 'menu_471', 'img' => 'desc_471', 'muscle_first' => '11;12', 'muscle_second' => '13;16', 'difficulty' => '2', 'equipment' => '1', 'use_weight' => '0'],

        ];
        DB::table('sport_exercises')->insert($data);
    }
}
