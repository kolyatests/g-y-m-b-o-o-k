<?php

namespace App\Models\Sport;

use App\Models\User;

class UserResultSave extends BaseModel
{
    protected $fillable = [
        'user_id',
        'exercise_id',
        'activity_days_id',
        'exercise',
        'description'
        ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

//    public function userResults($activityDaysId)
//    {
//        return $this->hasMany(UserResult::class, 'exercise_id', 'exercise_id')->where('activity_days_id', $activityDaysId);
//    }

    public function userResults()
    {
        return $this->hasMany(UserResult::class, 'exercise_id', 'exercise_id');
    }

    public function exercise()
    {
        return $this->hasOne(ExerciseText::class, 'exercise_id', 'exercise_id');
    }

    public function userTraining()
    {
        return $this->hasOne(UserTraining::class, 'exercise_id', 'exercise_id');
    }

    public function scopeActivityDays($query, $day)
    {
        return $query->UserId()->where('activity_days_id', $day);
    }

    public function scopeActivityUser($query, $id, $day)//
    {
        return $query->where('user_id', $id)->where('activity_days_id', $day);
    }

    public function getAllDataForTrain()////
    {
        $id = session('id', auth()->id());
        $activityDaysId = session('date', 0);
        $k = 0;
        $gymMini = [];
        $userResultSave = $this->activityUser($id, $activityDaysId)
            ->with(
                [
                    'exercise',
                    'userTraining',
                    'userResults' => function ($query)
                    use ($activityDaysId) {
                        $query->where('activity_days_id', $activityDaysId);
                    }
                ]
            )->get();
        if (session('check', 0) != 8) {
            foreach ($userResultSave as $exercise) {
                $k++;
                if ($exercise->exercise_id != 0 || $exercise->exercise_id) {
                    $isExeNow = false;
                    $div = 'ramkagifoff';
                    if ($k == 1) {
                        $div = 'ramkagifis';
                        $isExeNow = true;
                    }
                    $gymSet = [];
                    foreach ($exercise->userResults as $set) {
                        $comment = $set->comment;
                        if (!$set->comment) {
                            $comment = '';
                        }
                        if ($set->active == 1) {
                            $on = true;
                            $onDiv = 'card card-body bgF7BCBEred';
                            $gymSetEditTrue = false;
                        } else {
                            $on = false;
                            $onDiv = 'card card-body bgFFFFFFwhite';
                            $gymSetEditTrue = true;
                        }
                        array_push(
                            $gymSet,
                            (
                            [
                                'rep_min' => $set->rep_min,
                                'kg_km' => $set->kg_km,
                                'comment' => $comment,
                                'set' => $set->id,
                                'on' => $set->active,
                                'gym_set_on_true' => true,
                                'on_div' => $onDiv,
                                'up' => $on,
                                'gym_set_up_true' => false,
                                'edit' => false,
                                'gym_set_edit_true' => $gymSetEditTrue,
                                'del' => false,
                                'gym_set_del_true' => true,
                                'add' => false,
                            ])
                        );
                    }
                    if ($exercise->active == 1) {
                        $isOk = true;
                        $div = 'ramkagifon';
                    } else {
                        $isOk = false;
                        $div = 'ramkagifoff';
                    }
                    array_push(
                        $gymMini,
                        (
                        [
                            'gymcart_104' => $exercise->exercise->name,
                            'gymcart_105' => $exercise->description,
                            'gymcart_img_106' => '/storage/image/menu/menu_' . $exercise->exercise_id . '.png',
                            'ex' => $exercise->exercise_id,
                            'gympovt109' => $exercise->userTraining->repmin,
                            'gymkg111' => $exercise->userTraining->kgkm,
                            'isexenow' => $isExeNow,
                            'dir_mini' => $div,
                            'gym_set' => $gymSet,
                            'add' => false,
                            'is_ok' => $isOk,
                            'offlInput' => true,
                        ])
                    );
                }
            }
        } else {
            $k = 0;
            $gymMini = [];
            foreach ($userResultSave as $exercise) {
                $k++;
                if ($exercise->exercise_id != 0 || $exercise->exercise_id) {
                    $isExeNow = false;
                    $div = 'ramkagifoff';
                    if ($k == 1) {
                        $div = 'ramkagifis';
                        $isExeNow = true;
                    }
                    $gymSet = [];
                    foreach ($exercise->userResults as $set) {
                        $comment = $set->comment;
                        if (!$set->comment) {
                            $comment = '';
                        }
                        if ($set->active == 1) {
                            $on = true;
                            $onDiv = 'card card-body bgF7BCBEred';
                            $gymSetEditTrue = false;
                        } else {
                            $on = false;
                            $onDiv = 'card card-body bgFFFFFFwhite';
                            $gymSetEditTrue = false;
                        }
                        array_push(
                            $gymSet,
                            (
                            [
                                'rep_min' => $set->rep_min,
                                'kg_km' => $set->kg_km,
                                'comment' => $comment,
                                'set' => $set->id,
                                'on' => $set->active,
                                'gym_set_on_true' => true,
                                'on_div' => $onDiv,
                                'up' => $on,
                                'gym_set_up_true' => false,
                                'edit' => false,
                                'gym_set_edit_true' => $gymSetEditTrue,
                                'del' => false,
                                'gym_set_del_true' => false,
                                'add' => false,
                            ])
                        );
                    }
                    if ($exercise->active == 1) {
                        $isOk = true;
                        $div = 'ramkagifon';
                    } else {
                        $isOk = false;
                        $div = 'ramkagifoff';
                    }


                    array_push(
                        $gymMini,
                        (
                        [
                            'gymcart_104' => $exercise->exercise->name,
                            'gymcart_105' => $exercise->description,
                            'gymcart_img_106' => '/storage/image/menu/menu_' . $exercise->exercise_id . '.png',
                            'ex' => $exercise->exercise_id,
                            'gympovt109' => $exercise->userTraining->repmin,
                            'gymkg111' => $exercise->userTraining->kgkm,
                            'isexenow' => $isExeNow,
                            'dir_mini' => $div,
                            'gym_set' => $gymSet,
                            'add' => false,
                            'is_ok' => $isOk,
                            'offlInput' => false,
                        ])
                    );
                }
            }
        }

        return $gymMini;
    }

    public function saveDataFromTrain($request)////
    {
        if (session('check', 0) != 8) {
            $id = session('id');
            $active = 0;
            $activityDaysId = session('date', 0);
            UserResult::activityDays($activityDaysId)->delete();
            foreach ($request->data as $exercise) {
                $exIsOk = ($exercise['is_ok'] == true) ? 1 : 0;
                if ($exIsOk == 1) {
                    $active = 1;
                }
                UserResultSave::where('user_id',$id)->where('activity_days_id', $activityDaysId)
                    ->where('exercise_id', $exercise['ex'])
                    ->update(['active' => $exIsOk]);
                foreach ($exercise['gym_set'] as $set) {
                    $sort = (UserResult::activityExercise($activityDaysId, $exercise['ex'])->pluck('sort'))->max() + 1;
                    if (iconv_strlen($set['comment']) > 40) {
                        $set['comment'] = '';
                    }
                    if ($set['rep_min'] > 300 || $set['rep_min'] < 0 || !$set['rep_min']) {
                        $set['rep_min'] = 0;
                    }
                    if ($set['kg_km'] > 300 || $set['kg_km'] < 0 || !$set['kg_km']) {
                        $set['kg_km'] = 0;
                    }
                    $setOn = ($set['on'] == true) ? 1 : 0;
                    if ($setOn == 1) {
                        $active = 1;
                    }
                    UserResult::create(
                        [
                            'user_id' => $id,
                            'exercise_id' => (int)$exercise['ex'],
                            'activity_days_id' => $activityDaysId,
                            'rep_min' => (float)$set['rep_min'],
                            'kg_km' => (float)$set['kg_km'],
                            'comment' => $set['comment'],
                            'active' => $setOn,
                            'sort' => (int)$sort,
                        ]
                    );
                }
            }
            $date = session('date', 0);
            $muscle = ';';
            foreach (UserResultSave::where('user_id',$id)->where('activity_days_id', $date)->pluck('exercise_id') as $exercise) {
                if (UserResultSave::where('user_id',$id)->where('activity_days_id', $date)->where('exercise_id', $exercise)->value('active') == 1) {
                    $muscle = $muscle . (Exercise::where('exercise_id', $exercise)->value('muscle_first')) . ';';
                }
            }
            $muscle = array_unique(explode(';', $muscle));
            unset($muscle[0]);
            $muscle = implode(';', $muscle);
            UserActivityDays::date($date)->delete();
            if ($active == 0) {
                UserActivityDays::create(
                    [
                        'user_id' => $id,
                        'date' => $date,
                        'muscle' => $muscle,
                        'UserActivityDays' => null,
                        'active' => 0,
                        'trainer_id' => session('trainer_id', '0'),
                    ]
                );
            } else {
                UserActivityDays::create(
                    [
                        'user_id' => $id,
                        'date' => $date,
                        'muscle' => $muscle,
                        'description' => null,
                        'active' => 1,
                        'trainer_id' => session('trainer_id', '0'),
                    ]
                );
            }
        }
    }

}
