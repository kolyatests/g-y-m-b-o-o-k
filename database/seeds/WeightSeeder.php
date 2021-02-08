<?php

use Illuminate\Database\Seeder;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['weight_id' => '1','lang' => 'rus','name' => 'Кг'],
            ['weight_id' => '1','lang' => 'eng','name' => 'Kg'],
            ['weight_id' => '1','lang' => 'deu','name' => 'Kg'],
            ['weight_id' => '1','lang' => 'spa','name' => 'Kg'],
            ['weight_id' => '1','lang' => 'por','name' => 'Kg'],
            ['weight_id' => '2','lang' => 'rus','name' => 'Фунт'],
            ['weight_id' => '2','lang' => 'eng','name' => 'Lb'],
            ['weight_id' => '2','lang' => 'deu','name' => 'Pfund'],
            ['weight_id' => '2','lang' => 'spa','name' => 'Lb'],
            ['weight_id' => '2','lang' => 'por','name' => 'Lb'],
            ['weight_id' => '3','lang' => 'rus','name' => 'Кэтти'],
            ['weight_id' => '3','lang' => 'eng','name' => 'Catty'],
            ['weight_id' => '3','lang' => 'deu','name' => 'Kätti'],
            ['weight_id' => '3','lang' => 'spa','name' => 'Catty'],
            ['weight_id' => '3','lang' => 'por','name' => 'Jin'],
            ['weight_id' => '4','lang' => 'rus','name' => 'Унций'],
            ['weight_id' => '4','lang' => 'eng','name' => 'Oz'],
            ['weight_id' => '4','lang' => 'deu','name' => 'Unze'],
            ['weight_id' => '4','lang' => 'spa','name' => 'Oz'],
            ['weight_id' => '4','lang' => 'por','name' => 'Oz'],
        ];
        DB::table('sport_weights')->insert($data);
    }
}
