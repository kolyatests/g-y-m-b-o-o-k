<?php

namespace Tests\Generator;

use App\Models\User;

class UserGenerator
{
    public static function getUser(int $role = User::USER)
    {
        if($role == User::ADMIN){
            $data = ['role' => 1];
        } elseif ($role == User::TRAINER){
            $data = ['role' => 2];
        } elseif ($role == User::MODERATOR){
            $data = ['role' => 3];
        } elseif ($role == User::MANAGER){
            $data = ['role' => 4];
        } elseif ($role == User::EMAIL_UNVERIFIED){
            $data = [
                'verify' => 22,
                'role' => 0
                ];
        } elseif ($role == User::EMAIL_VERIFIED){
            $data = [
                'verify' => 88,
                'role' => 0
            ];
        }else {
            $data = [
                'verify' => 88,
                'role' => 0
            ];
        }
        return factory(User::class)->create( $data );

    }

}
