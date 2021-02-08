<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class MenuText extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_menu_texts';


    public function resolveRouteBinding($muscle, $field = null)///
    {
        return $this->where('menu_id', $muscle)->lang()->first();
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class, 'menu_id', 'menu_id');
    }

    public function image()
    {
        return $this->hasOne(Menu::class, 'menu_id', 'menu_id');
    }

    public function getAllMuscle()//
    {
        $cards = [
            [
                'name' => 'favorites_all',
                'text' => __('gym.favourites'),
                'img' => '/storage/image/favonm.png',
            ],
        ];
        $muscles = $this->lang()->get();
        foreach ($muscles as $muscle) {
            array_push(
                $cards,
                ([
                    'name' => 'exercises_all/' . $muscle->menu_id,
                    'text' => $muscle->text,
                    'img' => '/storage/image/menu_categ/menu_categ_' . $muscle->menu_id . '.png',
                ])
            );
        }
        array_push(
            $cards,
            ([
                'name' => 'exercises_all0',
                'text' => __('gym.all_exercises'),
                'img' => '/storage/image/menu_categ/menu_categ_0.png',
            ])
        );

        return $cards;
    }

    public function getAllExercisesByMuscle(MenuText $muscle)//
    {
        $exercises = $muscle->exercises()->with('exerciseText')->get();
        $cards = [];
        foreach ($exercises as $exercise) {
            array_push(
                $cards,
                (
                [
                    'name' => 'exercises/' . $exercise->exercise_id,
                    'text' => $exercise->exerciseText->name,
                    'img' => '/storage/image/menu/' . $exercise->img_prev . '.png',
                ])
            );
        }
        return $cards;
    }

}

