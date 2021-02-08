<?php

namespace App\Http\Controllers\Sport\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\TrainerCodeRequest;
use App\Models\Sport\UserActivityDays;
use App\Models\Sport\UserProgramWeek;
use App\Models\Sport\UserTrainer;
use App\Models\User;
use App\Services\Workout;

class UserController extends Controller
{
    public function index()
    {
        session(['id' => auth()->id()]);
        $users = User::find(auth()->user()->usersTrainer()->pluck('user_id'));
        return view('sport.trainer.users.index', compact('users'));
    }

    public function show(int $id)
    {
        session(['id' => auth()->id()]);

        return view('sport.trainer.users.show', compact('id'));
    }

    public function getTrainerPograms(int $id)
    {
        $programs = auth()->user()->userProgramWeeks;

        return view('sport.trainer.users.trainer-training', compact('programs', 'id'));
    }

    public function getUserPrograms(int $id)
    {
        $programs = UserProgramWeek::whereUserId($id)->get();

        return view('sport.trainer.users.student-training', compact('programs', 'id'));
    }

    public function getUserCalendar(int $id)
    {
        $days = UserActivityDays::whereUserId($id)->get();

        return view('sport.trainer.users.student-calendar', compact('id', 'days'));
    }

    public function copyTrainerProgramToStudent(int $id, int $program)
    {
        Workout::copyTrainerProgramToStudent($id, $program);
        $programs = UserProgramWeek::whereUserId($id)->get();

        return view('sport.trainer.users.student-training', compact('programs', 'id'));
    }

    public function getCalendar(int $id)
    {
        return view('sport.trainer.calendar.calendar', compact('id'));
    }

    public function create()
    {
        return view('sport.trainer.users.create');
    }

    public function store(TrainerCodeRequest $request)
    {
        $user = User::where('trainer_code', $request->trainer_code)->first();

        if (!UserTrainer::where('user_id', $user->id)->first()) {
            UserTrainer::create(
                [
                    'trainer_id' => auth()->id(),
                    'user_id' => $user->id,
                ]
            );
        } else {
            return redirect()->route('trainer.users.index')->with(['success' => 'Юзер уже добавлен']);
        }

        return redirect()->route('trainer.users.index');
    }

    public function deleteTrainerProgram(int $program, int $id)
    {
        session(['id' => $id]);
        Workout::deleteUserProgramWeek($program);
        session(['id' => auth()->id()]);
        $programs = UserProgramWeek::whereUserId($id)->get();

        return view('sport.trainer.users.student-training', compact('programs', 'id'));
    }
}
