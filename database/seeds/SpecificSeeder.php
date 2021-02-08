<?php

use Illuminate\Database\Seeder;

class SpecificSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '6', 'lang' => 'rus', 'name' => 'Круговые'],
            ['code' => '6', 'lang' => 'eng', 'name' => 'Circuit Workouts'],
            ['code' => '6', 'lang' => 'deu', 'name' => 'Zirkeltrainings'],
            ['code' => '6', 'lang' => 'spa', 'name' => 'Circulares'],
            ['code' => '6', 'lang' => 'por', 'name' => 'Circular'],
            ['code' => '9', 'lang' => 'rus', 'name' => 'Гантели'],
            ['code' => '9', 'lang' => 'eng', 'name' => 'Dumbbells'],
            ['code' => '9', 'lang' => 'deu', 'name' => 'Die Kurzhanteln'],
            ['code' => '9', 'lang' => 'spa', 'name' => 'Mancuernas'],
            ['code' => '9', 'lang' => 'por', 'name' => 'Halteres'],
            ['code' => '10', 'lang' => 'rus', 'name' => 'Гантели и штанга'],
            ['code' => '10', 'lang' => 'eng', 'name' => 'Dumbbells and Barbell'],
            ['code' => '10', 'lang' => 'deu', 'name' => 'Die Kurzhanteln und die Langhantel'],
            ['code' => '10', 'lang' => 'spa', 'name' => 'Mancuernas y barra'],
            ['code' => '10', 'lang' => 'por', 'name' => 'Halteres e barra'],
            ['code' => '11', 'lang' => 'rus', 'name' => 'Турник'],
            ['code' => '11', 'lang' => 'eng', 'name' => 'Horizontal Bar'],
            ['code' => '11', 'lang' => 'deu', 'name' => 'Das Reck'],
            ['code' => '11', 'lang' => 'spa', 'name' => 'Barra horizontal'],
            ['code' => '11', 'lang' => 'por', 'name' => 'Barra horizontal'],
            ['code' => '12', 'lang' => 'rus', 'name' => 'Турник и брусья'],
            ['code' => '12', 'lang' => 'eng', 'name' => 'Horizontal Bar and Parallel Bars'],
            ['code' => '12', 'lang' => 'deu', 'name' => 'Das Reck und Der Barren'],
            ['code' => '12', 'lang' => 'spa', 'name' => 'Barra horizontal y barra paralela'],
            ['code' => '12', 'lang' => 'por', 'name' => 'Barra horizontal e barras paralelas'],
            ['code' => '13', 'lang' => 'rus', 'name' => 'Скакалка'],
            ['code' => '13', 'lang' => 'eng', 'name' => 'Skipping Rope'],
            ['code' => '13', 'lang' => 'deu', 'name' => 'Das Seil'],
            ['code' => '13', 'lang' => 'spa', 'name' => 'Comba'],
            ['code' => '13', 'lang' => 'por', 'name' => 'Corda'],
            ['code' => '14', 'lang' => 'rus', 'name' => 'Без оборудования'],
            ['code' => '14', 'lang' => 'eng', 'name' => 'Without Equipment'],
            ['code' => '14', 'lang' => 'deu', 'name' => 'Ohne Equipment'],
            ['code' => '14', 'lang' => 'spa', 'name' => 'Sin equipo'],
            ['code' => '14', 'lang' => 'por', 'name' => 'Sem equipamento'],

        ];
        DB::table('sport_specifics')->insert($data);
    }
}
