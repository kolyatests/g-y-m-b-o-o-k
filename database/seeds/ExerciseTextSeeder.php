<?php

use Illuminate\Database\Seeder;

class ExerciseTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['exercise_id' => '1', 'lang' => 'rus', 'name' => 'Шраги с гантелями стоя', 'text' => 'Возьмите гантели и встаньте прямо, руки вытяните по швам. На выдохе поднимите гантели и тяните плечи максимально высоко. На вдохе вернитесь в исходную позицию.'],
            ['exercise_id' => '1', 'lang' => 'eng', 'name' => 'Dumbbell Shrug', 'text' => 'Take the dumbbells and stand straight, arms at your sides. Lift the dumbbells as you breathe out and stretch your shoulders, try to reach as high as possible. Lower the dumbbells back to the starting position as you breathe in.'],
            ['exercise_id' => '1', 'lang' => 'deu', 'name' => 'Schulterheben mit den Kurzhanteln im Stehen', 'text' => 'Nehmen Sie die Kurzhanteln und stellen Sie sich aufrecht hin, legen Sie die Hände an die Hosennaht. Beim Ausatmen heben Sie die Kurzhanteln und ziehen Sie die Schultern maximal nach oben. Beim Einatmen nehmen Sie die Ausgangsposition ein.'],
            ['exercise_id' => '1', 'lang' => 'spa', 'name' => 'Encogimiento de hombros con mancuernas', 'text' => 'Coja las Mancuernas y párate derecho con los brazos al lado. Levanta las Mancuernas en cuanto respiras y contraiga tus hombros. Intenta elevar los hombros lo mas alto posible. Baja las Mancuernas para la posición inicial en cuanto aspiras.'],
            ['exercise_id' => '1', 'lang' => 'por', 'name' => 'Encolhimento de ombros com halteres', 'text' => 'Pegue os halteres e permaneça reto com os braços ao lado do corpo. Levante os halteres e alongue os ombros enquanto respira, tente levá-los o mais alto possível. Abaixe os halteres até a posição inicial enquanto expira.'],
            ['exercise_id' => '2', 'lang' => 'rus', 'name' => 'Шраги со штангой', 'text' => 'Встаньте прямо, ноги на расстоянии ширины плеч. Возьмите штангу прямым хватом. На выдохе поднимите плечи максимально высоко. На вдохе вернитесь в исходную позицию.'],

            ['exercise_id' => '470', 'lang' => 'por', 'name' => 'Agachamento estático ao lado da parede', 'text' => 'Agache-se ao lado da parede até que os quadris não estejam paralelas ao chão e fique nesta posição imóvel.'],
            ['exercise_id' => '471', 'lang' => 'rus', 'name' => 'Приседания на одной ноге из положения сидя', 'text' => 'Удерживая спину прямой и одну ногу поднятой, садитесь и вставайте на статичную опору.'],
            ['exercise_id' => '471', 'lang' => 'eng', 'name' => 'Single Leg Squat To Bench', 'text' => 'Keeping your back straight, and one leg up, sit down and stand up on the static support.'],
            ['exercise_id' => '471', 'lang' => 'deu', 'name' => 'Einbeinige Kniebeugen aus dem Sitzen', 'text' => 'Halten Sie den Rücken gerade und ein Bein gehoben, setzen Sie sich und heben Sie sich auf einen statischen Stütz.'],
            ['exercise_id' => '471', 'lang' => 'spa', 'name' => 'Sentadillas con una sola pierna desde la posición sentada', 'text' => 'Manteniendo la espalda recta y una pierna elevada siéntate y nuevamente levántate desde un soporte estático.'],
            ['exercise_id' => '471', 'lang' => 'por', 'name' => 'Agachamento de uma perna só da posição sentada', 'text' => 'Mantendo as costas retas e uma perna levantada, sente-se e levante-se para um suporte estático.'],

        ];
        DB::table('sport_exercise_texts')->insert($data);
    }
}
