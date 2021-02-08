<?php

use Illuminate\Support\Facades\Route;

Route::name('trainer.')->middleware(['is_ban', 'auth', 'locate', 'is_verified'])->group(
    function () {
        Route::middleware(['is_trainer'])->group(
            function () {
                Route::group(
                    [
                        'prefix' => 'sport/trainer', 'namespace' => 'Sport\Trainer',

                    ],
                    function () {
                        Route::get('/users', 'UserController@index')->name('users.index');
                        Route::get('/users/show/{user}', 'UserController@show')->name('user.show');
                        Route::get('/programs', 'ProgramController@index')->name('programs.index');
                        Route::get('/trainer_programs/{user}', 'UserController@getTrainerPograms')->name('own.user.programs');
                        Route::get('/trainer_program/{prog}/add/{user}', 'UserController@copyTrainerProgramToStudent')->name('user.program.append');
                        Route::delete('/trainer_program/{prog}/delete/{user}', 'UserController@deleteTrainerProgram')->name('user.program.destroy');
                        Route::get('/user_programs/{user}', 'UserController@getUserPrograms')->name('user.programs');
                        Route::get('/trainer/student/add', 'UserController@create')->name('student.add');
                        Route::post('/trainer/student/store', 'UserController@store')->name('student.store');
                        Route::get('/user_calendar/{user}', 'UserController@getUserCalendar')->name('user.programs.calendar');
                        Route::get('/calendar/{user}', 'UserController@getCalendar')->name('user.calendar');
                        Route::get('/my_programs', 'ProgramController@getMyPrograms')->name('own.programs');
                        Route::get('/categories/{id}/exercises', 'ExerciseController@index')->name('categories.exercises.index');
                        Route::get('/categories/{muscle}/exercises/{exercises}', 'ExerciseController@show')->name('categories.exercises.show');
                        Route::get('/categories', 'CategoryController@index')->name('categories.index');

                        Route::get('/trainer/train_del/{id}', 'CalendarController@showDeletion')->name('user.calendar.del');
                        Route::get('/trainer/gym_edit/{day}/{id}', 'CalendarController@editNotCompleted')->name('calendar.gym.edit');
                        Route::get('/trainer/gym_view/{day}/{id}', 'CalendarController@editCompleted')->name('calendar.gym.view');
                        Route::get('/trainer/gym_copy/{day}/{id}', 'CalendarController@copy')->name('calendar.gym.copy');
                        Route::get('/trainer/gym_del/{day}/{id}', 'CalendarController@delete')->name('calendar.gym.delete');
                        Route::get('/trainer/gym_add/{day}/{id}', 'CalendarController@selectDayProgram')->name('user.program.add');
                        Route::get('/trainer/add_train/{prog}/{day}/{id}', 'CalendarController@selectProgram')->name('user.add.train');
                        Route::get('/trainer/add_train_day/{day_week}/{prog}/{day}/{id}', 'CalendarController@selectDay')->name('user.add.train.day');
                        Route::get('/gym_new_add/{day_week}/{prog}/{day}/{id}', 'CalendarController@fillNewTrain')->name('user.program.fill');
                        Route::get('/trainer/program/add/{prog}', 'ProgramController@copyStandartProgramToMe')->name('program.add');
                        Route::delete('/trainer/program/del/{prog}', 'ProgramController@delete')->name('program.del');
                    }
                );
            }
        );
    }
);
