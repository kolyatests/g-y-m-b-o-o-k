<?php


use Illuminate\Database\Seeder;

class WorkoutPlanTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['workout_plan_id' => '101','lang' => 'rus','name' => '3-х дневный тренировочный план для повышения тонуса','description' => 'Тренировочный план включает 3 тренировки в неделю для занятий в тренажерном зале. Время выполнения каждой тренировки 60-80 минут. Комплекс направлен на увеличение тонуса и силы мышц для дальнейшего наращивания нагрузок. Программа тренировок рассчитана на любой уровень спортивной подготовки.'],
            ['workout_plan_id' => '101','lang' => 'eng','name' => '3-Day Workout Plan for the Muscle Tone','description' => 'The plan consists of 3 workouts a week in a Sport. Each workout session is for 60-80 minutes. The complex is aimed at developing the muscle tone and the muscle strength for the future increase in the workout load. The workout session is aimed at people with any kind of athleticism.'],
            ['workout_plan_id' => '101','lang' => 'deu','name' => '3-tägiger Trainingsplan für die Tonuserhöhung','description' => 'Der Trainingsplan umfasst 3 Workouts pro Woche im Fitnessstudio. Die Zeit für die Erfüllung von jedem Workout beträgt 60-80 Minuten. Dieser Komplex soll die Muskeltonus und die Stärke erhöhen, um die Belastung weiter zu steigern. Der Trainingsplan ist für jeden Leistungsstand geeignet.'],
            ['workout_plan_id' => '101','lang' => 'spa','name' => 'Rutina de 3 días para el tono muscular','description' => 'La rutina consta de 3 entrenamientos a la semana en un gimnasio. El tiempo para ejecutar cada entrenamiento es de 60-80 minutos. Esta sesión esta dirigida para desarrollar el tono y la fuerza muscular para el futuro aumento de la carga de entrenamiento. La rutina está dirigida a las personas con cualquier tipo de acondicionamiento fisico.'],
            ['workout_plan_id' => '101','lang' => 'por','name' => 'Plano de treino de 3 dias para tonalização de músculo','description' => 'O plano consiste em três treinos por semana em uma academia. Tempo de realização de cada treino é 60-80 minutos. O treino é voltado para desenvolver o tônus muscular e força para o futuro aumento da carga de treino. A sessão de treino é indicada para pessoas com qualquer tipo de condicionamento físico.'],
            ['workout_plan_id' => '102','lang' => 'rus','name' => '3-х дневный тренировочный план для повышения тонуса','description' => 'Тренировочный план включает 3 тренировки в неделю для занятий в тренажерном зале. Время выполнения каждой тренировки 60-80 минут. Комплекс направлен на увеличение тонуса и силы мышц для дальнейшего наращивания нагрузок. Программа тренировок рассчитана на любой уровень спортивной подготовки.'],

           ['workout_plan_id' => '226','lang' => 'por','name' => 'Plano de 5 dias para ganho de massa','description' => 'A sessão de treino é destinada à a realização dos exercícios em casa 5 vezes por semana. Tempo de realização de cada treino é 30-40 minutos. Esta sessão pode ser dirigida para diferentes grupos musculares e pode ser utilizada em casa. Ela também tem o objetivo de fazer a diferença em suas sessões de treino. O plano é indicada para pessoas com qualquer tipo de condicionamento físico.'],
            ['workout_plan_id' => '227','lang' => 'rus','name' => '5-дневный тренировочный план для набора массы','description' => 'Программа тренировок рассчитана на выполнение упражнений дома 5 раз в неделю. Время выполнения каждой тренировки 30-40 минут. Комплекс можно использовать для разнонаправленной проработки мышц в домашних условиях, а также внесения разнообразия в Ваши тренировки. Тренировочный план рассчитан на любой уровень спортивной подготовки.'],
            ['workout_plan_id' => '227','lang' => 'eng','name' => '5-Day Workout Plan for Gaining Muscle Weight','description' => 'The workout session is aimed at performing the exercises at home 5 times a week. Each workout session is for 30-40 minutes. The complex can be aimed at different group muscles and can be used at home. It is also aimed at making a difference in your workout sessions. The workout plan is aimed at people with any kind of athleticism.'],
            ['workout_plan_id' => '227','lang' => 'deu','name' => '5-tägiger Trainingsplan für Masseaufbau','description' => 'Dieser Trainingsplan umfasst die Übungen, die 5 mal pro Woche zu Hause erfüllt werden. Die Zeit für die Erfüllung von jedem Workout beträgt 30-40 Minuten. Dieser Komplex kann für das uneinheitliche Durcharbeiten der Muskeln zu Hause verwendet sein, und auch für Abwechslung Ihrer Trainings. Der Trainingsplan ist für jeden Leistungsstand geeignet.'],
            ['workout_plan_id' => '227','lang' => 'spa','name' => 'Rutina de 5 días para ganar masa muscular','description' => 'La rutina está dirigida a la realización de los ejercicios en casa 5 veces a la semana. El tiempo para ejecutar cada entrenamiento es de 30-40 minutos. Esta sesión puede ser dirigido a los diferentes músculos de grupo y se puede utilizar en casa. También tiene como objetivo hacer una diferencia en sus sesiones de entrenamiento. La rutina está dirigido a personas con cualquier tipo de acondicionamiento fisico.'],
            ['workout_plan_id' => '227','lang' => 'por','name' => 'Plano de 5 dias para ganho de massa','description' => 'A sessão de treino é destinada à a realização dos exercícios em casa 5 vezes por semana. Tempo de realização de cada treino é 30-40 minutos. Esta sessão pode ser dirigida para diferentes grupos musculares e pode ser utilizada em casa. Ela também tem o objetivo de fazer a diferença em suas sessões de treino. O plano é indicada para pessoas com qualquer tipo de condicionamento físico.'],




        ];
        DB::table('workout_plan_texts')->insert($data);
    }
}
