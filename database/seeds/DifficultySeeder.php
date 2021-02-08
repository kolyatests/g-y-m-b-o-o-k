<?php

use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '1', 'lang' => 'rus', 'name' => 'Легкая сложность'],
            ['code' => '1', 'lang' => 'eng', 'name' => 'Easy Level'],
            ['code' => '1', 'lang' => 'deu', 'name' => 'Niedriger Schwierigkeitsgrad'],
            ['code' => '1', 'lang' => 'spa', 'name' => 'Complejidad leve'],
            ['code' => '1', 'lang' => 'por', 'name' => 'Nível de complexidade fácil'],
            ['code' => '2', 'lang' => 'rus', 'name' => 'Средняя сложность'],
            ['code' => '2', 'lang' => 'eng', 'name' => 'Middle Level'],
            ['code' => '2', 'lang' => 'deu', 'name' => 'Mittlerer Schwierigkeitsgrad'],
            ['code' => '2', 'lang' => 'spa', 'name' => 'Complejidad media'],
            ['code' => '2', 'lang' => 'por', 'name' => 'Nível de complexidade médio'],
            ['code' => '3', 'lang' => 'rus', 'name' => 'Тяжелая сложность'],
            ['code' => '3', 'lang' => 'eng', 'name' => 'High Level'],
            ['code' => '3', 'lang' => 'deu', 'name' => 'Hoher Schwierigkeitsgrad'],
            ['code' => '3', 'lang' => 'spa', 'name' => 'Complejidad severa'],
            ['code' => '3', 'lang' => 'por', 'name' => 'Nível de complexidade difícil'],

        ];
        DB::table('sport_difficulties')->insert($data);
    }
}
