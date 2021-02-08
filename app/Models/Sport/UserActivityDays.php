<?php

namespace App\Models\Sport;

use App\Models\User;
use App\Services\Activity;

class UserActivityDays extends BaseModel
{
    protected $fillable = [
        'user_id',
        'trainer_id',
        'date',
        'muscle',
        'description',
        'active',
    ];

    public function resolveRouteBinding($day, $field = null)///
    {
        return $this->UserId()->where('date', $day)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function userResult()
    {
        return $this->hasMany(UserResult::class, 'activity_days_id', 'date')->userId();
    }

    public function userResultSave()
    {
        return $this->hasMany(UserResultSave::class, 'activity_days_id', 'date')->userId();
    }

    public function scopeDateUserId($query, $dateFromCalendar)
    {
        return $query->UserId()->where('date', $dateFromCalendar);
    }

    public function scopeDate($query, $dateFromCalendar)
    {
        return $query->UserId()->where('date', $dateFromCalendar);
    }

    public function deleteUserProgram()////
    {
        $this->userResult()->delete();
        $this->userResultSave()->delete();
        $this->delete();
    }

    public function copyTrainToday()////
    {
        $user = auth()->user();
        session(['id' => $user->id]);
        $dateNow = dateNow();
        $user->userResultByDay($dateNow)->delete();
        $user->userResultSavesByDay($dateNow)->delete();
        $user->userActivityDaysByDay($dateNow)->delete();
        $descr = $user->userActivityDaysByDay($this->date)->value('description');
        foreach ($user->userResultSavesByDay($this->date)->get() as $act) {
            $user->userResultSaves()->create(
                [
                    'user_id' => $user->id,
                    'exercise_id' => $act->exercise_id,
                    'activity_days_id' => $dateNow,
                    'description' => $act->description,
                ]
            );
        }
        foreach ($user->userResultByDay($this->date)->get() as $act) {
            $user->userResult()->create(
                [
                    'user_id' => $user->id,
                    'exercise_id' => $act->exercise_id,
                    'activity_days_id' => $dateNow,
                    'rep_min' => $act->rep_min,
                    'kg_km' => $act->kg_km,
                    'comment' => $act->comment,
                    'sort' => $act->sort,
                ]
            );
        }
        $user->userActivityDays()->create(
            [
                'user_id' => $user->id,
                'trainer_id' => $user->userActivityDaysByDay($this->date)->first()->trainer_id,
                'date' => $dateNow,
                'muscle' => 0,
                'description' => $descr,
                'active' => 0,
            ]
        );
        session(
            [
                'date' => $dateNow,
                'description' => $descr,
            ]
        );

    }

}
