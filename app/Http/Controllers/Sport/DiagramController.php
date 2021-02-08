<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Models\Sport\UserGrafikExercise;
use Illuminate\Http\Request;

class DiagramController extends Controller//
{
    public function index()//
    {
        $array = (new UserGrafikExercise())->getMainDiagram();

        return view('sport.diagram.diagram', compact('array'));
    }

    public function updates()//
    {
        (new UserGrafikExercise())->deleteCreate();

        return redirect()->back();
    }

    public function addExercise(Request $request)//
    {
        if (!$request->list) {
            return redirect()->back();
        }
        foreach ($request->list as $key => $value) {
            UserGrafikExercise::userExercise($value)->update(['active' => 1]);
        }

        return redirect()->back();
    }

    public function delete(int $exercise)//
    {
        UserGrafikExercise::userExercise($exercise)->update(['active' => 0]);

        return redirect()->back();
    }

    public function show(int $exercise)//
    {
        session(['exercise' => $exercise]);

        return redirect()->back();
    }

    public function getPeriod(string $day)//
    {
        session(['set' => $day]);

        return redirect()->back();
    }

    public function getKgKm($km)//
    {
        session(['check' => $km]);

        return redirect()->back();
    }
}
