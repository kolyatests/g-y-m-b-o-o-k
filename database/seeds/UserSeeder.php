<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['role' => User::USER, 'name' => '', 'email' => '', 'password' => '', 'avatar' => '', 'verify' => ''],

        ];

        DB::table('users')->insert($data);
    }
}
