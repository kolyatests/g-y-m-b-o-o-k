<?php

use Illuminate\Database\Seeder;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '1', 'lang' => 'rus', 'name' => 'Сбросить вес'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'Lose Some Weight'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'Abnehmen'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'Perder peso!'],
            ['code' => '1', 'lang' => 'por', 'name' => 'Perder peso'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'Фитнес-тело'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Fitness-Body'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'Fitness-Körper'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'Cuerpo Fitness!'],
            ['code' => '2', 'lang' => 'por', 'name' => 'Corpo fitness'],
            ['code' => '3', 'lang' => 'rus', 'name' => 'Набор массы'],
            ['code' => '3', 'lang' => 'eng', 'name' => 'Gain More Muscle Mass'],
            ['code' => '3', 'lang' => 'deu', 'name' => 'Masseaufbau'],
            ['code' => '3', 'lang' => 'spa', 'name' => 'Ganar masa muscular!'],
            ['code' => '3', 'lang' => 'por', 'name' => 'Ganhar mais massa muscular'],
            ['code' => '4', 'lang' => 'rus', 'name' => 'Проработка отдельных мышц'],
            ['code' => '4', 'lang' => 'eng', 'name' => 'Specific Muscles Definition'],
            ['code' => '4', 'lang' => 'deu', 'name' => 'Durcharbeiten der einzelnen Muskeln'],
            ['code' => '4', 'lang' => 'spa', 'name' => 'Definición de músculos específicos!'],
            ['code' => '4', 'lang' => 'por', 'name' => 'Definição de músculos específicos'],
            ['code' => '6', 'lang' => 'rus', 'name' => 'Рельеф'],
            ['code' => '6', 'lang' => 'eng', 'name' => 'Muscle Definition'],
            ['code' => '6', 'lang' => 'deu', 'name' => 'Aufbau'],
            ['code' => '6', 'lang' => 'spa', 'name' => 'Relieve'],
            ['code' => '6', 'lang' => 'por', 'name' => 'Definição muscular'],
            ['code' => '7', 'lang' => 'rus', 'name' => 'Увеличение силы'],
            ['code' => '7', 'lang' => 'eng', 'name' => 'Strength Gain'],
            ['code' => '7', 'lang' => 'deu', 'name' => 'Erhöhung der Stärke'],
            ['code' => '7', 'lang' => 'spa', 'name' => 'Incremento de la fuerza'],
            ['code' => '7', 'lang' => 'por', 'name' => 'Crescimento da força'],
            ['code' => '9', 'lang' => 'rus', 'name' => 'Быстрые'],
            ['code' => '9', 'lang' => 'eng', 'name' => 'Quick'],
            ['code' => '9', 'lang' => 'deu', 'name' => 'Schnelle'],
            ['code' => '9', 'lang' => 'spa', 'name' => 'Más rápido'],
            ['code' => '9', 'lang' => 'por', 'name' => 'Rápidos'],

        ];
        DB::table('sport_purposes')->insert($data);
    }
}
