<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Models\Sport\UserTrainer;

class UserController extends Controller//
{
    public function getTrainerCode()
    {
        $trainerCode = rand(1000000, 9999999);
        auth()->user()->update(['trainer_code' => $trainerCode]);

        return redirect()->back();
    }

    public function trainerRemove()
    {
        auth()->user()->update(['trainer_code' => 0]);
        UserTrainer::where('user_id', auth()->id())->forceDelete();

        return redirect()->back();
    }

}
