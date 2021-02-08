<?php

use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['program_id' => '1', 'exercise_id' => '152', 'description' => '10-15 минут', 'lang' => 'rus'],
            ['program_id' => '1', 'exercise_id' => '7', 'description' => '3 подхода по 6-15 повторений', 'lang' => 'rus'],
            ['program_id' => '1', 'exercise_id' => '18', 'description' => '3 подхода по 10-15 повторений', 'lang' => 'rus'],
            ['program_id' => '1', 'exercise_id' => '189', 'description' => '3 подхода по 10-15 повторений', 'lang' => 'rus'],
            ['program_id' => '1', 'exercise_id' => '12', 'description' => '3 подхода по 10-15 повторений', 'lang' => 'rus'],
            ['program_id' => '537', 'exercise_id' => '105', 'description' => '4 sets com 20-25 repetições', 'lang' => 'por'],
            ['program_id' => '537', 'exercise_id' => '54', 'description' => '4 sets com 8-10 repetições', 'lang' => 'por'],
            ['program_id' => '537', 'exercise_id' => '197', 'description' => '3 sets com 8-10 repetições', 'lang' => 'por'],
            ['program_id' => '537', 'exercise_id' => '62', 'description' => '3 sets com 10-12 repetições', 'lang' => 'por'],
            ['program_id' => '537', 'exercise_id' => '119', 'description' => '3 sets com 15-20 repetições', 'lang' => 'por'],

        ];
        DB::table('sport_trainings')->insert($data);
    }
}
