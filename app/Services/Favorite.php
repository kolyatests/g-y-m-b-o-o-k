<?php

namespace App\Services;

use App\Models\Sport\UserFavorites;

class Favorite
{

    public static function favoriteExist($exercise)
    {
        return UserFavorites::userExercise($exercise)->value('exercise_id') == null;
    }

    public static function favoriteCreate($exercise)
    {
        UserFavorites::create(
            [
                'user_id' => auth()->id(),
                'exercise_id' => $exercise,
            ]
        );
    }
}
