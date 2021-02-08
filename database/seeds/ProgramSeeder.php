<?php

use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['program_week_id' => '1', 'program_id' => '1', 'name' => 'Понедельник', 'description' => 'Растягивайте и сгибайте мышцы между подходами для обеспечения максимальной производительности и их развития.', 'lang' => 'rus'],
            ['program_week_id' => '1', 'program_id' => '2', 'name' => 'Четверг', 'description' => 'Растягивайте и сгибайте мышцы между подходами для обеспечения максимальной производительности и их развития.', 'lang' => 'rus'],
            ['program_week_id' => '1', 'program_id' => '1', 'name' => 'Monday', 'description' => 'Flex and bend your muscles between the sets of exercises to ensure the maximum productivity and muscle building.', 'lang' => 'eng'],
            ['program_week_id' => '1', 'program_id' => '2', 'name' => 'Thursday', 'description' => 'Flex and bend your muscles between the sets of exercises to ensure the maximum productivity and muscle building.', 'lang' => 'eng'],
            ['program_week_id' => '1', 'program_id' => '1', 'name' => 'Montag', 'description' => 'Dehnen Sie die Muskeln aus und beugen Sie sie zwischen den Sätzen für maximale Leistung und ihre Entwicklung.', 'lang' => 'deu'],

             ['program_week_id' => '225', 'program_id' => '532', 'name' => 'Viernes', 'description' => 'Flexionar y doblar los músculos entre las series de ejercicios para asegurar la máxima productividad y la construcción de músculo.', 'lang' => 'esp'],
            ['program_week_id' => '225', 'program_id' => '528', 'name' => 'Segunda', 'description' => 'Flexione e dobre os músculos entre as séries de exercícios para garantir a máxima produtividade muscular.', 'lang' => 'por'],
            ['program_week_id' => '225', 'program_id' => '529', 'name' => 'Terça', 'description' => 'Flexione e dobre os músculos entre as séries de exercícios para garantir a máxima produtividade muscular.', 'lang' => 'por'],
            ['program_week_id' => '225', 'program_id' => '530', 'name' => 'Quarta', 'description' => 'Flexione e dobre os músculos entre as séries de exercícios para garantir a máxima produtividade muscular.', 'lang' => 'por'],
            ['program_week_id' => '225', 'program_id' => '531', 'name' => 'Quinta', 'description' => 'Flexione e dobre os músculos entre as séries de exercícios para garantir a máxima produtividade muscular.', 'lang' => 'por'],
            ['program_week_id' => '225', 'program_id' => '532', 'name' => 'Sexta', 'description' => 'Flexione e dobre os músculos entre as séries de exercícios para garantir a máxima produtividade muscular.', 'lang' => 'por'],

        ];
        DB::table('sport_programs')->insert($data);
    }
}
