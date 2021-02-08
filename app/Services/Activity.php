<?php

namespace App\Services;

use App\Models\Sport\UserActivityDays;
use App\Models\Sport\UserResult;
use App\Models\Sport\UserResultSave;

class Activity
{
    public function beginTrain()////
    {
        switch (session('check', 0)) {
            case 0:
                $gymStart = [
                    'end_save_100' => 'Заполнить тренировку и сохранить',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => '',
                    'check' => false,
                    'result' => __('gym.title_resultadd'),
                    'see' => true,
                ];
                break;
            case 1:
                $gymStart = [
                    'end_save_100' => 'Завершить тренировку и сохранить',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => __('gym.training_play_made'),
                    'check' => true,
                    'result' => __('gym.title_resultadd'),
                    'see' => true,
                ];
                break;
            case 2:
                $gymStart = [
                    'end_save_100' => 'Редактировать тренировку и сохранить',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => '',
                    'check' => false,
                    'result' => __('gym.title_resultadd'),
                    'see' => true,
                ];
                break;
            case 4:
                $gymStart = [
                    'end_save_100' => 'Завершить пропущенную тренировку и сохранить',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => __('gym.training_play_made'),
                    'check' => true,
                    'result' => __('gym.title_resultadd'),
                    'see' => true,
                ];
                break;
            case 5:
                $gymStart = [
                    'end_save_100' => 'Переделать прошлую тренировку и сохранить',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => __('gym.training_play_made'),
                    'check' => true,
                    'result' => __('gym.title_resultadd'),
                    'see' => true,
                ];
                break;
            case 6:
                $gymStart = [
                    'end_save_100' => 'Переделать тренировку и сохранить',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => __('gym.training_play_made'),
                    'check' => true,
                    'result' => __('gym.title_resultadd'),
                    'see' => true,
                ];
                break;
            case 7:
                $gymStart = [
                    'end_save_100' => 'Отредактировать тренировку и сохранить',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => __('gym.training_play_made'),
                    'check' => true,
                    'result' => __('gym.title_resultadd'),
                    'see' => true,
                ];
                break;
            case 8:
                $gymStart = [
                    'end_save_100' => 'Закрыть',
                    'comment_101' => __('gym.comment'),
                    'about_102' => 'о тренировке',
                    'activity_days_id3_103' => session('date', 0),
                    'save_set_113' => __('gym.save'),
                    'add_set_114' => __('gym.title_add'),
                    'ex_done_115' => __('gym.training_play_made'),
                    'check' => false,
                    'result' => __('gym.title_resultadd'),
                    'see' => false,
                ];
                break;
        }
        return $gymStart;
    }


    public static function deleteUserProgram($dateNow)
    {
        UserResult::activityDays($dateNow)->delete();
        UserResultSave::activityDays($dateNow)->delete();
        UserActivityDays::date($dateNow)->delete();
    }

    public static function createUserProgram(string $dateFromCalendar, string $dateNow, int $id)
    {
        $user = auth()->user();
        $descr = UserActivityDays::date($dateFromCalendar)->value('description');
        session(['trainer_id' => UserResultSave::activityDays($dateFromCalendar)->first()->trainer_id]);
        foreach (UserResultSave::activityDays($dateFromCalendar)->pluck('id') as $act) {
            $user->userResultSaves()->create(                [
                    'user_id' => $id,
                    'exercise_id' => UserResultSave::whereId($act)->value('exercise_id'),
                    'activity_days_id' => $dateNow,
                    'description' => UserResultSave::whereId($act)->value('description'),
                ]
            );
        }
        foreach (UserResult::activityDays($dateFromCalendar)->pluck('id') as $act) {
            UserResult::create(
                [
                    'user_id' => $id,
                    'exercise_id' => UserResult::whereId($act)->value('exercise_id'),
                    'activity_days_id' => $dateNow,
                    'rep_min' => UserResult::whereId($act)->value('rep_min'),
                    'kg_km' => UserResult::whereId($act)->value('kg_km'),
                    'comment' => UserResult::whereId($act)->value('comment'),
                    'sort' => UserResult::whereId($act)->value('sort'),
                ]
            );
        }
        UserActivityDays::create(
            [
                'user_id' => $id,
                'trainer_id' => UserActivityDays::where('date', $dateFromCalendar)->value('trainer_id'),
                'date' => $dateNow,
                'muscle' => 0,
                'description' => $descr,
                'active' => 0,
            ]
        );
        session(
            [
                'date' => $dateNow,
                'exercise' => $descr,
            ]
        );
    }


}
