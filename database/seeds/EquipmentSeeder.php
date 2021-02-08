<?php

use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['code' => '0', 'lang' => 'rus', 'name' => 'Спортивное снаряжение не требуется'],
            ['code' => '0', 'lang' => 'eng', 'name' => 'The sport equipment is not necessary'],
            ['code' => '0', 'lang' => 'deu', 'name' => 'Keine Sportausrüstung ist erforderlich'],
            ['code' => '0', 'lang' => 'spa', 'name' => 'El equipamiento deportivo no es necesario'],
            ['code' => '0', 'lang' => 'por', 'name' => 'O equipamento esportivo não é necessário'],
            ['code' => '1', 'lang' => 'rus', 'name' => 'стандартные тренажеры'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'Standard Exercise Machines'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'Standardgeräte'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'máquinas de ejercicio estándar'],
            ['code' => '1', 'lang' => 'por', 'name' => 'máquinas de exercício padrão'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'гантели'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Dumbbells'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'die Kurzhanteln'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'mancuernas'],
            ['code' => '2', 'lang' => 'por', 'name' => 'halteres'],
            ['code' => '3', 'lang' => 'rus', 'name' => 'штанга'],
            ['code' => '3', 'lang' => 'eng', 'name' => 'Barbell'],
            ['code' => '3', 'lang' => 'deu', 'name' => 'die Langhantel'],
            ['code' => '3', 'lang' => 'spa', 'name' => 'barra'],
            ['code' => '3', 'lang' => 'por', 'name' => 'barra'],
            ['code' => '4', 'lang' => 'rus', 'name' => 'турник'],
            ['code' => '4', 'lang' => 'eng', 'name' => 'Horizontal Bar'],
            ['code' => '4', 'lang' => 'deu', 'name' => 'das Reck'],
            ['code' => '4', 'lang' => 'spa', 'name' => 'barra horizontal'],
            ['code' => '4', 'lang' => 'por', 'name' => 'barra horizontal'],
            ['code' => '5', 'lang' => 'rus', 'name' => 'брусья'],
            ['code' => '5', 'lang' => 'eng', 'name' => 'Parallel Bars'],
            ['code' => '5', 'lang' => 'deu', 'name' => 'der Barren'],
            ['code' => '5', 'lang' => 'spa', 'name' => 'barra paralela'],
            ['code' => '5', 'lang' => 'por', 'name' => 'barras paralelas'],
            ['code' => '6', 'lang' => 'rus', 'name' => 'фитбол'],
            ['code' => '6', 'lang' => 'eng', 'name' => 'Fitball'],
            ['code' => '6', 'lang' => 'deu', 'name' => 'Gymnastikball'],
            ['code' => '6', 'lang' => 'spa', 'name' => 'fitball'],
            ['code' => '6', 'lang' => 'por', 'name' => 'bola de pilates'],
            ['code' => '7', 'lang' => 'rus', 'name' => 'скакалка (скакалку можно заменить на кардиотренажер, приседания или бег на месте)'],
            ['code' => '7', 'lang' => 'eng', 'name' => 'Skipping Rope (a cardio machine, squats or stationary running can be used instead of a skipping rope)'],
            ['code' => '7', 'lang' => 'deu', 'name' => 'das Seil (das Seil kann durch Cardio-Gerät, Kniebeugen oder Laufen auf der Stelle ersetzt werden)'],
            ['code' => '7', 'lang' => 'spa', 'name' => 'comba (el salto a la cuerda se puede sustituir por la máquina de cardio, por sentadillas o trotar en el lugar)'],
            ['code' => '7', 'lang' => 'por', 'name' => 'corda (pode substituir a corda por aparelho de treinamento cardio, flexões ou corrida na esteira)'],
            ['code' => '8', 'lang' => 'rus', 'name' => 'TRX'],
            ['code' => '8', 'lang' => 'eng', 'name' => 'TRX'],
            ['code' => '8', 'lang' => 'deu', 'name' => 'TRX'],
            ['code' => '8', 'lang' => 'spa', 'name' => 'TRX'],
            ['code' => '8', 'lang' => 'por', 'name' => 'TRX'],

        ];
        DB::table('sport_equipment')->insert($data);
    }
}
