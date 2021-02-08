<?php

namespace App\Http\Controllers\Sport\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Sport\ProgramWeek;
use App\Models\Sport\UserProgramWeek;
use App\Services\Workout;

class ProgramController extends Controller
{
    public function index()//
    {
        session(['id' => auth()->id()]);
        $programs = ProgramWeek::Lang()->get();
        return view('sport.trainer.programs.index', compact('programs'));
    }

    public function getMyPrograms()//
    {
        session(['id' => auth()->id()]);
        $programs = auth()->user()->userProgramWeeks()->get();

        return view('sport.trainer.myprograms.index', compact('programs'));
    }

    public function copyStandartProgramToMe(int $program)
    {
        session(['id' => auth()->id()]);
        Workout::copyStandartProgramToMe($program);
        $programs = auth()->user()->userProgramWeeks;

        return view('sport.trainer.myprograms.index', compact('programs'));
    }

    public function delete(int $program)
    {
        session(['id' => auth()->id()]);
        Workout::deleteUserProgramWeek($program);
        $programs = auth()->user()->userProgramWeeks()->get();

        return view('sport.trainer.myprograms.index', compact('programs'));
    }
}
