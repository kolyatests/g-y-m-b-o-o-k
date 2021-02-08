<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\CommentRequest;
use App\Models\Sport\Exercise;
use App\Models\Sport\UserProgram;
use App\Models\Sport\UserTraining;

class MyExerciseController extends Controller//
{
    public function create(UserProgram $day)//
    {
        session(['day' => $day->id, 'check' => 1]);

        return view('sport.myexercise.choose-exercise');
    }

    public function index()//
    {
        session(['check' => 0]);

        return view('sport.myexercise.choose-exercise');
    }

    public function edit(UserTraining $exercise)//
    {
        return view('sport.myexercise.edit-exercise', compact('exercise'));
    }

    public function update(CommentRequest $request, UserTraining $exercise)//
    {
        $exercise->update(['description' => $request->comment]);
        $day = $exercise->userProgram->id;

        return redirect()->route('sport.my.program.day', $day);
    }

    public function delete(UserTraining $exercise)//
    {
        $exercise->delete();

        return redirect()->back();
    }

    public function move(UserTraining $exercise1, UserTraining $exercise2)//
    {
        $exercise1->move($exercise2);

        return redirect()->back();
    }

    public function addExercise(Exercise $exercise)//
    {
        $day = session('day', 0);
        $exercise->existsOrCreateUserTraining($day);

        return redirect()->route('sport.my.program.day', $day);
    }
}
