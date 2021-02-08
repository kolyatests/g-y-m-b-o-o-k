<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Models\Sport\UserProgram;
use App\Models\Sport\WorkoutPlan;
use App\Services\Workout;
use Illuminate\Http\Request;

class StartController extends Controller//
{
    public function getMainPage()
    {
        $page = Workout::getMainPage();
        return view('main', compact('page'));
    }

    public function startNewTrain(UserProgram $day)//
    {
        $day->createDataForTrain();

        return view('sport.myprogram.start');
    }

    public function fillNewTrain(UserProgram $day, string $date)//
    {
        $day->fillNewTrain($day, $date);

        return view('sport.myprogram.start');
    }

    public function getAllTrains()//
    {
        return view('sport.program.all-exercise');
    }

    public function getAllTrainsWithPhoto()//
    {
        return view('sport.program.all-exercise-photo');
    }

    public function selectAll(Request $request)//
    {
        return (new WorkoutPlan())->selectByParameters($request);
    }

    public function selectAllPhoto(Request $request)//
    {
        return (new WorkoutPlan())->selectByParametersWithPhoto($request);
    }
}
