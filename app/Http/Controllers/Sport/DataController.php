<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Models\Sport\Exercise;
use App\Models\Sport\ExerciseText;
use App\Models\Sport\MenuText;
use App\Models\Sport\UserFavorites;
use App\Models\Sport\UserResultSave;
use App\Services\Activity;
use Illuminate\Http\Request;

class DataController extends Controller//
{
    public function getMuscle()////
    {
        return (new MenuText())->getAllMuscle();
    }

    public function getFavorite(Request $request)////
    {
        return (!UserFavorites::userExercise((int)$request->favorite)->value('exercise_id')) ? 0 : 1;
    }

    public function setFavorite(Request $request)////
    {
        return (new UserFavorites())->toggleFavorite($request->favorite);
    }

    public function start()///
    {
        return (new Activity())->beginTrain();
    }

    public function saveProgram(Request $request)///
    {
        (new UserResultSave())->saveDataFromTrain($request);
    }

    public function getData()////
    {
        return (new UserResultSave())->getAllDataForTrain();
    }

    public function getExercise(Exercise $program)//
    {
        return (new Exercise())->getExerciseDescription($program);
    }

    public function getMuscleExercises(MenuText $muscle)//
    {
        return (new MenuText())->getAllExercisesByMuscle($muscle);
    }

    public function getFavoritesAll()////
    {
        return (new UserFavorites())->getAllFavorites();
    }

    public function getExercisesAll()////
    {
        return (new ExerciseText())->getAllExercise();
    }
}
