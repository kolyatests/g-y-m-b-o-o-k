<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Models\Shop\UserShopProgram;
use App\Models\Sport\Program;
use App\Models\Sport\ProgramWeek;
use App\Models\Sport\UserProgramWeek;
use App\Models\Sport\WorkoutPlan;

class ProgramController extends Controller//
{
    public function selectPrograms(string $plans)//
    {
        $pages = (new WorkoutPlan())->findAllTrain($plans);

        return view('sport.program.choose-buy-workout', compact('pages'));
    }

    public function createTrainFromPlan(ProgramWeek $program)///
    {
        $workoutPlan = $program->workoutPlan;
        $statusShopped = UserShopProgram::getStatusShopped($program);

        return view('sport.program.buy-workout', compact('workoutPlan', 'statusShopped'));
    }

    public function choseProgram(ProgramWeek $program)///
    {
        $program = $program->where('program_week_id', $program->program_week_id)->with('programs')->first();

        return view('sport.program.add-workout', compact('program'));
    }

    public function choiceFromWorkout(Program $day)//
    {
        $exercises = $day->trainingByProgramId($day->program_id)->get();

        return view('sport.program.show', compact('exercises'));
    }

    public function addToMyPrograms(ProgramWeek $program)//
    {
        UserShopProgram::checkShopped($program);
        UserProgramWeek::copyStandartProgramToMe($program);
        $programs = auth()->user()->userProgramWeeks;

        return view('sport.myprogram.my-programs', compact('programs'));
    }


    public function getShareWorkout(string $day, int $id)//
    {
        session(
            [
                'id' => $id,
                'date' => $day,
                'check' => 8,
            ]
        );

        return view('sport.myprogram.start');
    }

}
