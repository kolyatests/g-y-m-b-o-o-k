<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\ProgramRequest;
use App\Models\Sport\UserProgram;
use App\Models\Sport\UserProgramWeek;

class MyTrainingDayController extends Controller//
{
    public function store(ProgramRequest $request, UserProgramWeek $program)
    {
        (new UserProgram())->createUserProgram($request, $program);

        return redirect()->route('sport.my.program.week', $program);
    }

    public function show(UserProgram $day)//
    {
        $day->checkOwner($day);
        $day = UserProgram::where('user_program_id', $day->user_program_id)->with('userTrainings', 'userTrainings.exerciseName', 'userProgramWeek')->first();

        return view('sport.mytrainday.add-exercise', compact('day'));
    }

    public function delete(UserProgram $day)//
    {
        $day->checkOwner($day);
        $day->userTrainings()->delete();
        $day->delete();

        return redirect()->back();
    }

}
