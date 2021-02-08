<?php

use Illuminate\Database\Seeder;

class MusclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['code' => '1', 'lang' => 'rus', 'name' => 'Шея'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'Neck'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'Hals'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'Cuello'],
            ['code' => '1', 'lang' => 'por', 'name' => 'Pescoço'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'Плечи'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Shoulders'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'Schultern'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'Hombros'],
            ['code' => '2', 'lang' => 'por', 'name' => 'Ombros'],
            ['code' => '3', 'lang' => 'rus', 'name' => 'Бицепс'],
            ['code' => '3', 'lang' => 'eng', 'name' => 'Biceps'],
            ['code' => '3', 'lang' => 'deu', 'name' => 'Bizeps'],
            ['code' => '3', 'lang' => 'spa', 'name' => 'Bíceps'],
            ['code' => '3', 'lang' => 'por', 'name' => 'Bíceps'],
            ['code' => '4', 'lang' => 'rus', 'name' => 'Трицепс'],
            ['code' => '4', 'lang' => 'eng', 'name' => 'Triceps'],
            ['code' => '4', 'lang' => 'deu', 'name' => 'Trizeps'],
            ['code' => '4', 'lang' => 'spa', 'name' => 'Tríceps'],
            ['code' => '4', 'lang' => 'por', 'name' => 'Tríceps'],
            ['code' => '5', 'lang' => 'rus', 'name' => 'Предплечья'],
            ['code' => '5', 'lang' => 'eng', 'name' => 'Forearms'],
            ['code' => '5', 'lang' => 'deu', 'name' => 'Unterarme'],
            ['code' => '5', 'lang' => 'spa', 'name' => 'Antebrazos'],
            ['code' => '5', 'lang' => 'por', 'name' => 'Antebraços'],
            ['code' => '6', 'lang' => 'rus', 'name' => 'Грудь'],
            ['code' => '6', 'lang' => 'eng', 'name' => 'Chest'],
            ['code' => '6', 'lang' => 'deu', 'name' => 'Brust'],
            ['code' => '6', 'lang' => 'spa', 'name' => 'Pecho'],
            ['code' => '6', 'lang' => 'por', 'name' => 'Peito'],
            ['code' => '7', 'lang' => 'rus', 'name' => 'Пресс'],
            ['code' => '7', 'lang' => 'eng', 'name' => 'Abdominal Muscles'],
            ['code' => '7', 'lang' => 'deu', 'name' => 'Bauchmuskulatur'],
            ['code' => '7', 'lang' => 'spa', 'name' => 'Musculos Abdominales'],
            ['code' => '7', 'lang' => 'por', 'name' => 'Músculos abdominais'],
            ['code' => '8', 'lang' => 'rus', 'name' => 'Трапеции'],
            ['code' => '8', 'lang' => 'eng', 'name' => 'Traps'],
            ['code' => '8', 'lang' => 'deu', 'name' => 'Trapezmuskel'],
            ['code' => '8', 'lang' => 'spa', 'name' => 'Trapecio'],
            ['code' => '8', 'lang' => 'por', 'name' => 'Trapézio'],
            ['code' => '9', 'lang' => 'rus', 'name' => 'Широчайшие'],
            ['code' => '9', 'lang' => 'eng', 'name' => 'Lats'],
            ['code' => '9', 'lang' => 'deu', 'name' => 'Breiteste'],
            ['code' => '9', 'lang' => 'spa', 'name' => 'Dorsales'],
            ['code' => '9', 'lang' => 'por', 'name' => 'Grande dorsal'],
            ['code' => '10', 'lang' => 'rus', 'name' => 'Разгибатели спины'],
            ['code' => '10', 'lang' => 'eng', 'name' => 'Back Extensors'],
            ['code' => '10', 'lang' => 'deu', 'name' => 'Rückenstrecker'],
            ['code' => '10', 'lang' => 'spa', 'name' => 'Dorsal (Ancho]'],
            ['code' => '10', 'lang' => 'por', 'name' => 'Lombar'],
            ['code' => '11', 'lang' => 'rus', 'name' => 'Ягодицы'],
            ['code' => '11', 'lang' => 'eng', 'name' => 'Glutes'],
            ['code' => '11', 'lang' => 'deu', 'name' => 'Gesäß'],
            ['code' => '11', 'lang' => 'spa', 'name' => 'Glúteos'],
            ['code' => '11', 'lang' => 'por', 'name' => 'Glúteos'],
            ['code' => '12', 'lang' => 'rus', 'name' => 'Квадрицепс'],
            ['code' => '12', 'lang' => 'eng', 'name' => 'Quadriceps'],
            ['code' => '12', 'lang' => 'deu', 'name' => 'Quadrizeps'],
            ['code' => '12', 'lang' => 'spa', 'name' => 'Cuadríceps'],
            ['code' => '12', 'lang' => 'por', 'name' => 'Quadríceps'],
            ['code' => '13', 'lang' => 'rus', 'name' => 'Бицепс бедра'],
            ['code' => '13', 'lang' => 'eng', 'name' => 'Hamstring'],
            ['code' => '13', 'lang' => 'deu', 'name' => 'Beinbizeps'],
            ['code' => '13', 'lang' => 'spa', 'name' => 'Isquiotibiales'],
            ['code' => '13', 'lang' => 'por', 'name' => 'Isquiossurais'],
            ['code' => '14', 'lang' => 'rus', 'name' => 'Икры'],
            ['code' => '14', 'lang' => 'eng', 'name' => 'Calf Muscle'],
            ['code' => '14', 'lang' => 'deu', 'name' => 'Unterschenkelmuskel'],
            ['code' => '14', 'lang' => 'spa', 'name' => 'Músculos Pantorrilla'],
            ['code' => '14', 'lang' => 'por', 'name' => 'Panturrilha'],
            ['code' => '15', 'lang' => 'rus', 'name' => 'Абдукторы'],
            ['code' => '15', 'lang' => 'eng', 'name' => 'Abductors'],
            ['code' => '15', 'lang' => 'deu', 'name' => 'Abduktoren'],
            ['code' => '15', 'lang' => 'spa', 'name' => 'Abductores'],
            ['code' => '15', 'lang' => 'por', 'name' => 'Abdutores'],
            ['code' => '16', 'lang' => 'rus', 'name' => 'Аддукторы'],
            ['code' => '16', 'lang' => 'eng', 'name' => 'Adductors'],
            ['code' => '16', 'lang' => 'deu', 'name' => 'Adduktoren'],
            ['code' => '16', 'lang' => 'spa', 'name' => 'Aductores'],
            ['code' => '16', 'lang' => 'por', 'name' => 'Adutores'],

        ];
        DB::table('sport_muscles')->insert($data);
    }
}
