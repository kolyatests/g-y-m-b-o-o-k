<?php

use Illuminate\Database\Seeder;

class ProgramWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['program_week_id' => '1', 'name' => 'Мужчина. Здоровое тело', 'description' => null, 'lang' => 'rus'],
            ['program_week_id' => '1', 'name' => 'Man. Healthy Body', 'description' => null, 'lang' => 'eng'],
            ['program_week_id' => '1', 'name' => 'Männer. Gesunder Körper', 'description' => null, 'lang' => 'deu'],
            ['program_week_id' => '1', 'name' => 'Hombre. Cuerpo Fitness', 'description' => null, 'lang' => 'esp'],
            ['program_week_id' => '1', 'name' => 'Homem. Corpo Saudável', 'description' => null, 'lang' => 'por'],
            ['program_week_id' => '2', 'name' => 'Женщина. Стройная фигура', 'description' => null, 'lang' => 'rus'],

            ['program_week_id' => '1009', 'name' => 'Entrenamientos', 'description' => null, 'lang' => 'esp'],
            ['program_week_id' => '1009', 'name' => 'Treinos', 'description' => null, 'lang' => 'por'],
            ['program_week_id' => '1010', 'name' => 'Тренировки дома', 'description' => null, 'lang' => 'rus'],
            ['program_week_id' => '1010', 'name' => 'Workout Home', 'description' => null, 'lang' => 'eng'],
            ['program_week_id' => '1010', 'name' => 'Workout für zu Hause', 'description' => null, 'lang' => 'deu'],
            ['program_week_id' => '1010', 'name' => 'Entrenamientos', 'description' => null, 'lang' => 'esp'],
            ['program_week_id' => '1010', 'name' => 'Treinos', 'description' => null, 'lang' => 'por'],

        ];
        DB::table('sport_program_weeks')->insert($data);
    }
}
