<?php

namespace App\Models\Sport;

use App\Models\User;

class UserResult extends BaseModel
{
    protected $fillable = [
        'user_id',
        'exercise_id',
        'activity_days_id',
        'rep_min',
        'kg_km',
        'comment',
        'sort',
        'active',
        ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function scopeActivityExercise($query, $day, $exercise)
    {
        return $query->UserId()->where('activity_days_id', $day)->where('exercise_id', $exercise);
    }

    public function scopeUserActivityExercise($query, $id, $day, $exercise)
    {
        return $query->where('user_id', $id)->where('activity_days_id', $day)->where('exercise_id', $exercise);
    }

    public function scopeActivityDays($query, $day)
    {
        return $query->UserId()->where('activity_days_id', $day);
    }

    public function scopeActivityDaysUser($query, $id, $day)
    {
        return $query->where('user_id', $id)->where('activity_days_id', $day);
    }
}
