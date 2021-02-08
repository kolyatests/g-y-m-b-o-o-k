<?php

use Illuminate\Database\Seeder;

class DescEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '1', 'lang' => 'rus', 'name' => 'Не требуется'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'Not Required'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'Nicht erforderlich'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'No se requiere'],
            ['code' => '1', 'lang' => 'por', 'name' => 'Não requerido'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'Тренажер'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Exercise Machine'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'Trainingsgerät'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'La máquina'],
            ['code' => '2', 'lang' => 'por', 'name' => 'Máquina de fitness'],
            ['code' => '3', 'lang' => 'rus', 'name' => 'Гантели'],
            ['code' => '3', 'lang' => 'eng', 'name' => 'Dumbbells'],
            ['code' => '3', 'lang' => 'deu', 'name' => 'Die Kurzhanteln'],
            ['code' => '3', 'lang' => 'spa', 'name' => 'Mancuernas'],
            ['code' => '3', 'lang' => 'por', 'name' => 'Halteres'],
            ['code' => '4', 'lang' => 'rus', 'name' => 'Штанга'],
            ['code' => '4', 'lang' => 'eng', 'name' => 'Barbell'],
            ['code' => '4', 'lang' => 'deu', 'name' => 'Die Langhantel'],
            ['code' => '4', 'lang' => 'spa', 'name' => 'Barra'],
            ['code' => '4', 'lang' => 'por', 'name' => 'Barra'],
            ['code' => '5', 'lang' => 'rus', 'name' => 'Турник'],
            ['code' => '5', 'lang' => 'eng', 'name' => 'Horizontal Bar'],
            ['code' => '5', 'lang' => 'deu', 'name' => 'Das Reck'],
            ['code' => '5', 'lang' => 'spa', 'name' => 'Barra horizontal'],
            ['code' => '5', 'lang' => 'por', 'name' => 'Barra horizontal'],
            ['code' => '6', 'lang' => 'rus', 'name' => 'Брусья'],
            ['code' => '6', 'lang' => 'eng', 'name' => 'Parallel Bars'],
            ['code' => '6', 'lang' => 'deu', 'name' => 'Der Barren'],
            ['code' => '6', 'lang' => 'spa', 'name' => 'Barra paralela'],
            ['code' => '6', 'lang' => 'por', 'name' => 'Barras paralelas'],
            ['code' => '7', 'lang' => 'rus', 'name' => 'Фитбол'],
            ['code' => '7', 'lang' => 'eng', 'name' => 'Fitball'],
            ['code' => '7', 'lang' => 'deu', 'name' => 'Gymnastikball'],
            ['code' => '7', 'lang' => 'spa', 'name' => 'Fitball'],
            ['code' => '7', 'lang' => 'por', 'name' => 'Bola de pilates'],
            ['code' => '8', 'lang' => 'rus', 'name' => 'Скакалка'],
            ['code' => '8', 'lang' => 'eng', 'name' => 'Skipping Rope'],
            ['code' => '8', 'lang' => 'deu', 'name' => 'Das Seil'],
            ['code' => '8', 'lang' => 'spa', 'name' => 'Comba'],
            ['code' => '8', 'lang' => 'por', 'name' => 'Corda'],
            ['code' => '9', 'lang' => 'rus', 'name' => 'TRX'],
            ['code' => '9', 'lang' => 'eng', 'name' => 'TRX'],
            ['code' => '9', 'lang' => 'deu', 'name' => 'TRX'],
            ['code' => '9', 'lang' => 'spa', 'name' => 'TRX'],
            ['code' => '9', 'lang' => 'por', 'name' => 'TRX'],
            ['code' => '10', 'lang' => 'rus', 'name' => 'Гири'],
            ['code' => '10', 'lang' => 'eng', 'name' => 'Kettlebells'],
            ['code' => '10', 'lang' => 'deu', 'name' => 'Kugelhantel'],
            ['code' => '10', 'lang' => 'spa', 'name' => 'Pesos'],
            ['code' => '10', 'lang' => 'por', 'name' => 'Pesos'],
            ['code' => '11', 'lang' => 'rus', 'name' => 'Эспандер'],
            ['code' => '11', 'lang' => 'eng', 'name' => 'Resistance Band'],
            ['code' => '11', 'lang' => 'deu', 'name' => 'Expander'],
            ['code' => '11', 'lang' => 'spa', 'name' => 'Expansor'],
            ['code' => '11', 'lang' => 'por', 'name' => 'Extensor'],
            ['code' => '12', 'lang' => 'rus', 'name' => 'Другое'],
            ['code' => '12', 'lang' => 'eng', 'name' => 'Other'],
            ['code' => '12', 'lang' => 'deu', 'name' => 'Anderes'],
            ['code' => '12', 'lang' => 'spa', 'name' => 'Otro'],
            ['code' => '12', 'lang' => 'por', 'name' => 'Outro'],

        ];
        DB::table('sport_desc_equipment')->insert($data);
    }
}
