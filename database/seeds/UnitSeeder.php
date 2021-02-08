<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['unit_id' => '1','lang' => 'rus','name' => 'См'],
            ['unit_id' => '1','lang' => 'eng','name' => 'Cm'],
            ['unit_id' => '1','lang' => 'deu','name' => 'Cm'],
            ['unit_id' => '1','lang' => 'spa','name' => 'Cm'],
            ['unit_id' => '1','lang' => 'por','name' => 'Cm'],
            ['unit_id' => '2','lang' => 'rus','name' => 'Мм'],
            ['unit_id' => '2','lang' => 'eng','name' => 'Mm'],
            ['unit_id' => '2','lang' => 'deu','name' => 'Mm'],
            ['unit_id' => '2','lang' => 'spa','name' => 'Mm'],
            ['unit_id' => '2','lang' => 'por','name' => 'Mm'],
            ['unit_id' => '3','lang' => 'rus','name' => 'Фут'],
            ['unit_id' => '3','lang' => 'eng','name' => 'Ft'],
            ['unit_id' => '3','lang' => 'deu','name' => 'Fuß'],
            ['unit_id' => '3','lang' => 'spa','name' => 'Ft'],
            ['unit_id' => '3','lang' => 'por','name' => 'Ft'],
            ['unit_id' => '4','lang' => 'rus','name' => 'Дюйм'],
            ['unit_id' => '4','lang' => 'eng','name' => 'In'],
            ['unit_id' => '4','lang' => 'deu','name' => 'Zoll'],
            ['unit_id' => '4','lang' => 'spa','name' => 'In'],
            ['unit_id' => '4','lang' => 'por','name' => 'In'],
            ['unit_id' => '5','lang' => 'rus','name' => 'Кг'],
            ['unit_id' => '5','lang' => 'eng','name' => 'Kg'],
            ['unit_id' => '5','lang' => 'deu','name' => 'Kg'],
            ['unit_id' => '5','lang' => 'spa','name' => 'Kg'],
            ['unit_id' => '5','lang' => 'por','name' => 'Kg'],
            ['unit_id' => '6','lang' => 'rus','name' => 'Фунт'],
            ['unit_id' => '6','lang' => 'eng','name' => 'Lb'],
            ['unit_id' => '6','lang' => 'deu','name' => 'Pfund'],
            ['unit_id' => '6','lang' => 'spa','name' => 'Lb'],
            ['unit_id' => '6','lang' => 'por','name' => 'Lb'],
            ['unit_id' => '7','lang' => 'rus','name' => 'Унций'],
            ['unit_id' => '7','lang' => 'eng','name' => 'Oz'],
            ['unit_id' => '7','lang' => 'deu','name' => 'Unze'],
            ['unit_id' => '7','lang' => 'spa','name' => 'Oz'],
            ['unit_id' => '7','lang' => 'por','name' => 'Oz'],
            ['unit_id' => '8','lang' => 'rus','name' => '%'],
            ['unit_id' => '8','lang' => 'eng','name' => '%'],
            ['unit_id' => '8','lang' => 'deu','name' => '%'],
            ['unit_id' => '8','lang' => 'spa','name' => '%'],
            ['unit_id' => '8','lang' => 'por','name' => '%'],
            ['unit_id' => '9','lang' => 'rus','name' => 'Кэтти'],
            ['unit_id' => '9','lang' => 'eng','name' => 'Catty'],
            ['unit_id' => '9','lang' => 'deu','name' => 'Kätti'],
            ['unit_id' => '9','lang' => 'spa','name' => 'Catty'],
            ['unit_id' => '9','lang' => 'por','name' => 'Jin'],
            ['unit_id' => '10','lang' => 'rus','name' => 'мм рт. ст.'],
            ['unit_id' => '10','lang' => 'eng','name' => 'mmHg'],
            ['unit_id' => '10','lang' => 'deu','name' => 'mmHg'],
            ['unit_id' => '10','lang' => 'spa','name' => 'mmHg'],
            ['unit_id' => '10','lang' => 'por','name' => 'mmHg'],
            ['unit_id' => '11','lang' => 'rus','name' => 'уд/мин'],
            ['unit_id' => '11','lang' => 'eng','name' => 'bpm'],
            ['unit_id' => '11','lang' => 'deu','name' => 'S/min'],
            ['unit_id' => '11','lang' => 'spa','name' => 'latidos/min'],
            ['unit_id' => '11','lang' => 'por','name' => 'BPM'],

        ];
        DB::table('sport_units')->insert($data);
    }
}
