<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\StoreProgramRequest;
use App\Models\Sport\UserProgramWeek;
use App\Models\User;

class MyProgramController extends Controller//
{
    public function index()//
    {
        $userWithProgramWeeks = User::where('id', auth()->id())->with('userProgramWeeks')->first();

        return view('sport.myprogram.my-programs', compact('userWithProgramWeeks'));
    }

    public function store(StoreProgramRequest $request)//
    {
        if ($request->name) {
            (new UserProgramWeek())->createUserProgramWeek($request);
        }
        $userWithProgramWeeks = User::where('id', auth()->id())->with('userProgramWeeks')->first();

        return view('sport.myprogram.my-programs', compact('userWithProgramWeeks'));
    }

    public function show(UserProgramWeek $program)//
    {
        $program->checkOwner($program);

        return view('sport.myprogram.my-program', compact('program'));
    }

    public function delete(UserProgramWeek $program)//
    {
        $program->checkOwner($program);

        $program->userShopping($program)->update(['status' => 2]);
        $program->userTrainings()->delete();
        $program->userPrograms()->delete();
        $program->delete();
        $userWithProgramWeeks = User::where('id', auth()->id())->with('userProgramWeeks')->first();

        return view('sport.myprogram.my-programs', compact('userWithProgramWeeks'));
    }
}
