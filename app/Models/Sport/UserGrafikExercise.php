<?php

namespace App\Models\Sport;

use DateTime;

class UserGrafikExercise extends BaseModel
{
    protected $fillable = [
        'user_id',
        'exercise_id',
        'active',
        ];

    public function exercise()
    {
        return $this->hasOne(ExerciseText::class, 'exercise_id', 'exercise_id');
    }

    public function scopeUserExercise($query, $exercise)
    {
        return $query->UserId()->where('exercise_id', $exercise);
    }

    public function  getMainDiagram()
    {
        $user = auth()->user();
        $exercise = session('exercise', 0);
        $period = session('set', 0);
        $km = session('check', 0);
        $date = new DateTime();
        if ($period == 1) {
            $date1 = $date->modify('-1 month')->format('Y-m-d');
        } elseif ($period == 3) {
            $date1 = $date->modify('-3 month')->format('Y-m-d');
        } elseif ($period == 6) {
            $date1 = $date->modify('-6 month')->format('Y-m-d');
        } elseif ($period == 12) {
            $date1 = $date->modify('-1 year')->format('Y-m-d');
        } else {
            $date1 = $date->modify('-20 year')->format('Y-m-d');
        }
        if (!$km == 20) {
            $km = 10;
        }
        $data = '';

        foreach ($user->UserResult->sortBy('activity_days_id')
                     ->where('exercise_id', $exercise)->where('active', 1)->pluck('activity_days_id') as $day) {
            if (UserResult::activityExercise($day, $exercise)->where('active', 1)->value('activity_days_id') > $date1) {
                if (count(UserResult::activityDays($day)->where('active', 1)->pluck('exercise_id')) == 1) {
                    $date1 = $day;
                    $kg = ($km == 10)
                        ? UserResult::activityExercise($day, $exercise)->where('active', 1)->value('rep_min')
                        : UserResult::activityExercise($day, $exercise)->where('active', 1)->value('kg_km');
                } elseif (count(UserResult::activityDays($day)->where('active', 1)->pluck('exercise_id')) > 1) {
                    $date1 = $day;
                    $kg = ($km == 10)
                        ? UserResult::activityExercise($day, $exercise)->where('active', 1)->max('rep_min')
                        : UserResult::activityExercise($day, $exercise)->where('active', 1)->max('kg_km');
                }
                $day4 = strtotime($day);
                $data = $data . '{ x: new Date(' . $day4 * 1000 . '), y: ' . $kg . '},';
            }
        }
        if ($user->userTrainings()->userExercise($exercise)->get()->count()) {
            $repmin = $user->userTrainings()->userExercise($exercise)->first()->repmin;
            $kgkm = $user->userTrainings()->userExercise($exercise)->first()->kgkm;
        } else {
            $repmin = '-';
            $kgkm = '-';
        }
        $array = [
            'data' => $data,
            'ex' => $exercise,
            'km' => $km,
            'date1' => $date1,
            'repmin' => $repmin,
            'kgkm' => $kgkm,
            'exercises' => UserGrafikExercise::userId()->where('active', 1)->get(),
            'exercises_distinct' => UserGrafikExercise::userId()->distinct()->get(),
        ];
        return $array;
    }

    public function deleteCreate()
    {
        $user = auth()->user();
        $user->userGrafikExercises()->delete();
        foreach ($user->userResult()->where('active', 1)->get()->unique('exercise_id')->pluck('exercise_id') as $exercise) {
            $user->userGrafikExercises()->create(
                [
                    'user_id' => auth()->id(),
                    'exercise_id' => $exercise,
                    'active' => 0,
                ]
            );
        }
    }
}
