<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseText extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_exercise_texts';

    public function scopeExerciseLang($query, $exercise)
    {
        return $query->where('exercise_id', $exercise)->lang();
    }

    public function scopeExercise($query, $exercise)
    {
        return $query->where('exercise_id', $exercise);
    }

    public function getAllExercise()////
    {
        $exercises = $this->lang()->get();
        $cards = [];
        foreach ($exercises as $exercise) {
            array_push(
                $cards,
                (
                [
                    'name' => 'exercises' . $exercise->exercise_id,
                    'text' => $exercise->name,
                    'img' => '/storage/image/menu/menu_' . $exercise->exercise_id . '.png',
                ])
            );
        }
        return $cards;
     }
}
