<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use App\Models\Sport\UserActivityDays;

class CalendarController extends Controller//
{
    public function getCalendar()//
    {
        return view('sport.calendar.calendar');
    }

    public function showDeletion()//
    {
        session(['id' => auth()->id()]);

        return view('sport.calendar.delete-workout');
    }

    public function editNotCompleted(UserActivityDays $day)//
    {
        session(
            [
                'id' => auth()->id(),
                'date' => $day->date,
                'check' => 2,
            ]
        );

        return view('sport.myprogram.start');
    }

    public function editCompleted(UserActivityDays $day)//
    {
        session(
            [
                'id' => auth()->id(),
                'date' => $day->date,
                'check' => 7,
            ]
        );

        return view('sport.myprogram.start');
    }

    public function copy(UserActivityDays $day)//
    {
        $day->copyTrainToday();

        return view('sport.calendar.calendar');
    }

    public function restart()//
    {
        session(
            [
                'id' => auth()->id(),
                'date' => dateNow(),
                'check' => 6,
            ]
        );
        UserActivityDays::date(dateNow())->update(['active' => 0]);

        return view('sport.myprogram.start');
    }

    public function start()//
    {
        session(
            [
                'id' => auth()->id(),
                'date' => dateNow(),
                'check' => 1,
            ]
        );
        UserActivityDays::date(dateNow())->update(['active' => 0]);

        return view('sport.myprogram.start');
    }

    public function startMissed(UserActivityDays $day)//
    {
        session(
            [
                'id' => auth()->id(),
                'date' => $day->date,
                'check' => 4,
            ]
        );
        return view('sport.myprogram.start');
    }

    public function restartPast(UserActivityDays $day)//
    {
        session(
            [
                'id' => auth()->id(),
                'date' => $day->date,
                'check' => 5,
            ]
        );

        return view('sport.myprogram.start');
    }

    public function delete(UserActivityDays $day)//
    {
        $day->deleteUserProgram();

        return view('sport.calendar.calendar');
    }
}
