<?php

use Illuminate\Database\Seeder;

class KmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['km_id' => '1', 'lang' => 'rus', 'name' => 'Км'],
            ['km_id' => '1', 'lang' => 'eng', 'name' => 'Km'],
            ['km_id' => '1', 'lang' => 'deu', 'name' => 'Km'],
            ['km_id' => '1', 'lang' => 'spa', 'name' => 'Km'],
            ['km_id' => '1', 'lang' => 'por', 'name' => 'Km'],
            ['km_id' => '2', 'lang' => 'rus', 'name' => 'Миль'],
            ['km_id' => '2', 'lang' => 'eng', 'name' => 'Miles'],
            ['km_id' => '2', 'lang' => 'deu', 'name' => 'Meile'],
            ['km_id' => '2', 'lang' => 'spa', 'name' => 'Miles'],
            ['km_id' => '2', 'lang' => 'por', 'name' => 'Milhas'],

        ];
        DB::table('sport_kms')->insert($data);
    }
}
