<?php

namespace App\Models\Sport;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserProgram extends BaseModel
{
    protected $fillable = [
        'user_id',
        'user_program_id',
        'name',
        'program_week_id',
        'exercise',
    ];

    public function resolveRouteBinding($day, $field = null)///
    {
        return $this->UserId()->find($day);
    }

    public function createUserProgram($request, $program)//
    {
        $user = auth()->user();
        if ($request->nameday) {
            $validator = Validator::make(
                $request->all(),
                [
                    'nameday' => [
                        'max:15',
                        Rule::unique('user_programs', 'name')->where(
                            function ($query) use ($user, $program) {
                                $query->where('user_id', $user->id)->where('program_week_id', $program->program_week_id);
                            }
                        ),
                    ],
                ]
            );
            if ($validator->fails()) {
                back()->withErrors($validator);
            } else {
                $this->create(
                    [
                        'user_id' => $user->id,
                        'user_program_id' => ($user->userPrograms()->pluck('user_program_id')->isEmpty())
                            ? 1000 : ($user->userPrograms()->pluck('user_program_id')->max()) + 1,
                        'name' => preg_replace('/[^\p{L}0-9 ]/iu', '', $request->nameday),
                        'program_week_id' => $program->program_week_id,
                    ]
                );
            }
        }
    }

    public function checkOwner($day)//
    {
        if($day->user_id != auth()->id()){
            abort(404);
        }
    }

    public function createDataForTrain()//
    {
        $user = auth()->user();
        $dateNow = date('Y-m-d', strtotime(date('Y-m-d H:i:s')) + session('offset', 0));
        $user->userResultByDay($dateNow)->delete();
        $user->userResultSavesByDay($dateNow)->delete();
        $user->userActivityDaysByDay($dateNow)->delete();
        $userTrainings = $this->userTrainings;
        foreach ($userTrainings as $exercise) {
            $user->userResultSaves()->create(
                [
                    'user_id' => $user->id,
                    'exercise_id' => $exercise->exercise_id,
                    'activity_days_id' => $dateNow,
                    'description' => $exercise->description,
                ]
            );
        }
        session(
            [
                'exercise' => $userTrainings->first()->exercise_id,
                'description' => $userTrainings->first()->description,
                'date' => $dateNow,
                'check' => 1,
                'id' => $user->id,
            ]
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function userTrainings()
    {
        return $this->hasMany(UserTraining::class, 'user_program_id', 'user_program_id')->UserId();
    }

    public function userProgramWeek()
    {
        return $this->hasOne(UserProgramWeek::class, 'program_week_id', 'program_week_id')->UserId();
    }


    public function scopeProgram($query, $day)
    {
        return $query->UserId()->where('user_program_id', $day);
    }

    public function scopeUserWeek($query, int $program)
    {
        return $query->UserId()->where('program_week_id', $program);
    }

    public function scopeUserWeekProgram($query, $day, int $program)
    {
        return $query->UserId()->where('program_week_id', $program)->where('user_program_id', $day);
    }

    public function fillNewTrain(UserProgram $day, string $date)//
    {
        $user = auth()->user();
        $user->userResultByDay($date)->delete();
        $user->userResultSavesByDay($date)->delete();
        $user->userActivityDaysByDay($date)->delete();
        $day = $day->where('user_program_id', $day->user_program_id)->with('userTrainings', 'userProgramWeek')->first();
        session(
            [
                'exercise' => $day->userTrainings->first()->exercise_id,
                'description' => $day->userProgramWeek->description,
                'date' => $date,
                'check' => 0,
                'trainer_id' => $day->userProgramWeek->trainer_id,

            ]
        );
        foreach ($day->userTrainings as $exercise) {
            $user->userResultSaves()->create(
                [
                    'user_id' => $user->id,
                    'exercise_id' => $exercise->exercise_id,
                    'activity_days_id' => $date,
                    'description' => $exercise->description,
                ]
            );
        }
    }

}
