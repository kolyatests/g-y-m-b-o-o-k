<?php

namespace App\Http\Controllers\Sport\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Sport\Exercise;
use App\Models\Sport\ExerciseText;
use App\Services\Workout;

class ExerciseController extends Controller
{
    public function index(int $id)
    {
        session(['id' => auth()->id()]);
        $exercise = Exercise::where('menu_id', $id)->pluck('exercise_id')->toArray();
        $exercises = ExerciseText::Lang()->toBase()->whereIn('exercise_id', $exercise)->get(['id', 'exercise_id', 'name']);

        return view('sport.trainer.exercises.index', compact('exercises', 'id'));
    }

    public function show(int $exercise)
    {
        session(['id' => auth()->id()]);
        $page = Workout::createPageExercise($exercise);

        return view('sport.trainer.exercises.show', compact('page'));
    }
}
