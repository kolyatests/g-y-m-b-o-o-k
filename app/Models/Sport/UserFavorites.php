<?php

namespace App\Models\Sport;

use App\Models\User;
use Debugbar;

class UserFavorites extends BaseModel
{
    protected $fillable = [
        'user_id',
        'exercise_id',
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function desc()
    {
        return $this->hasMany(ExerciseText::class, 'exercise_id', 'exercise_id');
    }

    public function exerciseText()
    {
        return $this->hasOne(ExerciseText::class, 'exercise_id', 'exercise_id')->lang();
    }

    public function scopeUserExercise($query, $exercise)
    {
        return $query->UserId()->where('exercise_id', $exercise);
    }

    public function toggleFavorite($favorites)//
    {
        $exercise = preg_replace('/[^0-9]/', '', $favorites);
        if (!$this->where('exercise_id', $exercise)->first()) {
            $this->create(
                [
                    'user_id' => auth()->id(),
                    'exercise_id' => $exercise,
                ]
            );
            return true;
        } else {
            $this->where('exercise_id', $exercise)->delete();
            return false;
        }
    }

    public function getAllFavorites()////
    {
        $UserFavorites = $this->UserId()->with('exerciseText')->get();
        $cards = [];
        foreach ($UserFavorites as $exercise) {
            array_push(
                $cards,
                (
                [
                    'name' => 'exercises/' . $exercise->exercise_id,
                    'text' => $exercise->exerciseText->name,
                    'img' => '/storage/image/menu/menu_' . $exercise->exercise_id . '.png',
                ])
            );
        }

        return $cards;
    }

}
