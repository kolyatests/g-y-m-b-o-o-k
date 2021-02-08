<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Models\Sport\UserProgram;
use App\Models\Sport\UserProgramWeek;

class AddProgramInCalendarController extends Controller//
{

    public function selectProgram(UserProgramWeek $program, string $date)//
    {
        $program = $program->where('program_week_id', $program->program_week_id)->with('userPrograms')->first();

        return view('sport.calendar.choose-day', compact('program', 'date'));
    }

    public function index(string $day)//
    {
        $programs = auth()->user()->userProgramWeeks;
        return view('sport.calendar.select-workout', compact('programs', 'day'));
    }

    public function selectDayProgram(UserProgram $day, string $date)//
    {
        $day = $day->where('user_program_id', $day->user_program_id)->with('userProgramWeek', 'userTrainings.exerciseName')->first();

        return view('sport.calendar.select-fill-workout', compact('day', 'date'));
    }
}
