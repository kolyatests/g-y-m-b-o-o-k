<?php

namespace App\Models\Sport;

use App\Models\Shop\UserShopProgram;
use App\Models\User;

class UserProgramWeek extends BaseModel
{
    protected $fillable = [
        'user_id',
        'trainer_id',
        'workout_plan_week_id',
        'name',
        'program_week_id',
        'exercise',
    ];


    public function resolveRouteBinding($program, $field = null)///
    {
        return $this->userId()->find($program);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function userPrograms()
    {
        return $this->hasMany(UserProgram::class, 'program_week_id', 'program_week_id')->userId();
    }

    public function userTrainings()
    {
        return $this->hasMany(UserTraining::class, 'program_week_id', 'program_week_id')->userId();
    }

    public function userShoppings()
    {
        return $this->hasMany(UserShopProgram::class, 'workout_plan_id', 'workout_plan_week_id')->userId();
    }

    public function userShopping($program)
    {
        return $this->hasMany(UserShopProgram::class, 'workout_plan_id', 'workout_plan_week_id')->userId()
            ->where('workout_plan_id', $program->workout_plan_week_id);
    }

    public function createUserProgramWeek($request)//
    {
        $user = auth()->user();
        $programWeekId = ($user->userProgramWeeks()->pluck('program_week_id')->isEmpty())
            ? 2000 : ($user->userProgramWeeks()->pluck('program_week_id')->max()) + 1;
        $this->create(
            [
                'user_id' => $user->id,
                'trainer_id' => ($user->isTrainer()) ? $trainerId = $user->id : 0,
                'name' => $request->name,
                'description' => $request->description,
                'program_week_id' => $programWeekId,
            ]
        );
    }


    public function checkOwner($program)//
    {
        if($program->user_id != auth()->id()){
            abort(404);
        }
    }


    public function scopeUserWeek($query, int $program)
    {
        return $query->UserId()->where('program_week_id', $program);
    }


    public static function checkAdded($program)//
    {
        if (self::where('user_id', session('id'))->where('name', $program->name)->first()) {
            return redirect()->route('sport.main');
        }
    }


    public static function copyStandartProgramToMe($program)//
    {
        $user = auth()->user();
        if (!self::where('user_id', session('id'))->where('name', $program->name)->first()) {
            $programWeekId = $user->userProgramWeeks()->pluck('program_week_id')->isEmpty()
                ? 2000 : ($user->userProgramWeeks()->pluck('program_week_id')->max()) + 1;
            self::create(
                [
                    'user_id' => $user->id,
                    'trainer_id' => $user->isTrainer() ? $user->id : 0,
                    'program_week_id' => $programWeekId,
                    'workout_plan_week_id' => $program->program_week_id,
                    'name' => $program->name,
                    'description' => $program->description
                ]
            );

            foreach (Program::programWeekId($program->program_week_id)->pluck('program_id') as $programId) {
                $userProgramId = $user->userPrograms()->pluck('user_program_id')->isEmpty() ? 1000 : ($user->userPrograms()->pluck('user_program_id')->max()) + 1;
                $k = 0;
                UserProgram::create(
                    [
                        'user_id' => $user->id,
                        'user_program_id' => $userProgramId,
                        'program_week_id' => $programWeekId,
                        'name' => Program::programWeekIdProgramId($program->program_week_id, $programId)->value('name'),
                        'description' => Program::programWeekIdProgramId($program->program_week_id, $programId)->value('description'),
                    ]
                );

                foreach (Training::programId($programId)->pluck('exercise_id') as $exercise) {
                    $repmin = Exercise::exercise($exercise)->value('use_weight');
                    $repmin1 = ($repmin != 2 && $repmin != 3) ? __('gym.resultadd_numb') : __('gym.resultadd_min');
                    $kmkg = Exercise::exercise($exercise)->value('use_weight');
                    $trainerId = ($user->isTrainer()) ? $user->id : 0;

                    UserTraining::create(
                        [
                            'user_id' => $user->id,
                            'user_program_id' => $userProgramId,
                            'program_week_id' => $programWeekId,
                            'exercise_id' => $exercise,
                            'repmin' => $repmin1,
                            'kgkm' => ($kmkg != 2 && $kmkg != 3) ? $user->weight()->value('name') : $user->km()->value('name'),
                            'description' => Training::programId($programId)->where('exercise_id', $exercise)->value('description'),
                        ]
                    );
                    $k++;
                }
            }
        }
    }

}


