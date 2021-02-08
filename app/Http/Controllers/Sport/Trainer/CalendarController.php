<?php

namespace App\Http\Controllers\Sport\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Sport\UserTraining;
use App\Services\Activity;

class CalendarController extends Controller
{

    public function showDeletion(int $id)//
    {
        session(['id' => $id]);

        return view('sport.trainer.calendar.delete-workout', compact('id'));
    }

    public function editNotCompleted(string $day, int $id)//
    {
        session(
            [
                'id' => $id,
                'date' => $day,
                'check' => 2,
            ]
        );

        return view('sport.myprogram.start');
    }

    public function editCompleted(string $day, int $id)//
    {
        session(
            [
                'id' => $id,
                'date' => $day,
                'check' => 7,
            ]
        );

        return view('sport.myprogram.start');
    }

    public function copy(string $day, int $id)
    {
        session(['id' => $id]);
        $dateNow = dateNow();
        $dateFromCalendar = $day;
        Activity::deleteUserProgram($dateNow);
        Activity::createUserProgram($dateFromCalendar, $dateNow, $id);

        return view('sport.trainer.calendar.calendar', compact('id'));
    }

    public function delete(string $day, int $id)
    {
        session(['id' => $id]);
        Activity::deleteUserProgram($day);

        return view('sport.trainer.calendar.calendar', compact('id'));
    }

    public function selectDayProgram(string $day, int $id)
    {
        session(['id' => $id]);
        $programs = auth()->user()->userProgramWeeks;

        return view('sport.trainer.calendar.student-training', compact('programs', 'day', 'id'));
    }

    public function selectProgram(int $program, string $day, int $id)
    {
        session(['id' => $id]);
        $daysWeek = auth()->user()->userPrograms()->userWeek($program)->get();

        return view('sport.trainer.calendar.student-training-days', compact('program', 'day', 'daysWeek', 'id'));
    }

    public function selectDay(int $dayWeek, int $program, string $day, int $id)
    {
        $text = [
            'name' => auth()->user()->userProgramWeeks()->userWeek($program)->value('name'),
            'day_week' => auth()->user()->userPrograms()->userWeekProgram($dayWeek, $program)->value('name'),
        ];
        $training = auth()->user()->userTrainings() - userWeekProgram($dayWeek, $program)->get();
        session(['id' => $id]);

        return view('sport.trainer.calendar.student-training-day', compact('dayWeek', 'program', 'day', 'training', 'text', 'id'));
    }

    public function fillNewTrain(int $dayWeek, int $program, string $day, int $id)
    {
        $user = auth()->user();
        $firstExercise = UserTraining::programUser($id, $dayWeek)->first()->exercise_id;
        session(
            [
                'exercise' => $firstExercise,
                'Exercise' => null,
                'date' => $day,
                'check' => 0,
                'id' => $id,
            ]
        );
        Activity::deleteUserProgram($day);
        foreach (UserTraining::programUser($id, $dayWeek)->where('program_week_id', $program)->get() as $exercise) {
            $user->userResultSaves()->create(
                [
                    'user_id' => $id,
                    'exercise_id' => $exercise->exercise_id,
                    'activity_days_id' => $day,
                    'Exercise' => $exercise->Exercise,
                ]
            );
        }

        return view('sport.myprogram.start');
    }
}
