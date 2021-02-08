<?php



use Illuminate\Database\Seeder;

class WorkoutPlanWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['workout_plan_week_id' => '1','lang' => 'rus','name' => 'Для мужчин',],
            ['workout_plan_week_id' => '1','lang' => 'eng','name' => 'For Man'],
            ['workout_plan_week_id' => '1','lang' => 'deu','name' => 'Für Männer',],
            ['workout_plan_week_id' => '1','lang' => 'spa','name' => 'Para hombre',],
            ['workout_plan_week_id' => '1','lang' => 'por','name' => 'Para homem',],
            ['workout_plan_week_id' => '2','lang' => 'rus','name' => 'Для женщин',],
            ['workout_plan_week_id' => '2','lang' => 'eng','name' => 'For Woman',],
            ['workout_plan_week_id' => '2','lang' => 'deu','name' => 'Für Frauen',],
            ['workout_plan_week_id' => '2','lang' => 'spa','name' => 'Para mujer',],
            ['workout_plan_week_id' => '2','lang' => 'por','name' => 'Para mulher',],
            ['workout_plan_week_id' => '3','lang' => 'rus','name' => 'Для мужчин и женщин',],
            ['workout_plan_week_id' => '3','lang' => 'eng','name' => 'For Man and Woman',],
            ['workout_plan_week_id' => '3','lang' => 'deu','name' => 'Für Männer und Frauen',],
            ['workout_plan_week_id' => '3','lang' => 'spa','name' => 'Para hombre y mujer',],
            ['workout_plan_week_id' => '3','lang' => 'por','name' => 'Para homem e mulher',],

        ];
        DB::table('workout_plan_weeks')->insert($data);
    }
}
