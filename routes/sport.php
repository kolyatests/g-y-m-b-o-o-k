<?php

use Illuminate\Support\Facades\Route;

Route::name('sport.')->middleware(['is_ban', 'auth', 'locate','is_verified'])->group(
    function () {
        Route::group(
            [
                'prefix' => 'sport', 'namespace' => 'Sport',
            ],
            function () {
                Route::get('/', 'StartController@getMainPage')->name('main');
                Route::get('/code', 'UserController@getTrainerCode')->name('trainer.code');
                Route::get('/manager/del', 'UserController@trainerRemove')->name('trainer.remove');
                Route::get('/gym_start_new/{day}', 'StartController@startNewTrain')->name('gym.start');//
                Route::get('/gym_new_add/{day}/{date}', 'StartController@fillNewTrain')->name('gym.fill');
                Route::post('/select_all_photo', 'StartController@selectAllPhoto')->name('select.all.photo');
                Route::post('/select_all', 'StartController@selectAll')->name('select.all');
                Route::get('/all_trains', 'StartController@getAllTrains')->name('all.trains');
                Route::get('/all_trains_photo', 'StartController@getAllTrainsWithPhoto')->name('all.trains.photo');

                Route::get('/muscle', 'DataController@getMuscle');
                Route::post('/get_favorite', 'DataController@getFavorite')->name('get.favorite');
                Route::post('/set_favorite', 'DataController@setFavorite')->name('set.favorite');
                Route::get('/exercises_all/{muscle}', 'DataController@getMuscleExercises')->name('muscle.exercises');
                Route::get('/exercises/{program}', 'DataController@getExercise')->name('exercise.show');
                Route::get('/favorites_all', 'DataController@getFavoritesAll')->name('favorites');

                Route::post('/gym_exe_ok', 'DataController@saveProgram');




                Route::get('/gym_star_new', 'DataController@start');
                Route::get('/gym_all', 'DataController@getData');
                Route::get('/exercises_all0', 'DataController@getExercisesAll');

                Route::get('/calendar/calendar', 'CalendarController@getCalendar')->name('calendar');
                Route::get('/calendar/train_del', 'CalendarController@showDeletion')->name('calendar.delete');
                Route::get('/calendar/gym_edit/{day}', 'CalendarController@editNotCompleted')->name('calendar.gym.edit');
                Route::get('/calendar/gym_view/{day}', 'CalendarController@editCompleted')->name('calendar.gym.view');
                Route::get('/calendar/gym_copy/{day}', 'CalendarController@copy')->name('calendar.gym.copy');
                Route::get('/calendar/gym_restart', 'CalendarController@restart')->name('calendar.gym.restart');
                Route::get('/calendar/gym_start_missed/{day}', 'CalendarController@startMissed')->name('calendar.gym.start.missed');
                Route::get('/calendar/gym_restart_past/{day}', 'CalendarController@restartPast')->name('calendar.gym.restart.past');
                Route::get('/calendar/gym_del/{day}', 'CalendarController@delete')->name('calendar.gym.delete');
                Route::get('/calendar/gym_start', 'CalendarController@start')->name('calendar.gym.start');
                Route::get('/calendar/gym_add/{day}', 'AddProgramInCalendarController@index')->name('calendar.program');
                Route::get('/add_train/{program}/{day}', 'AddProgramInCalendarController@selectProgram')->name('calendar.program.show');
                Route::get('/add_train_day/{day}/{date}', 'AddProgramInCalendarController@selectDayProgram')->name('calendar.program.day.show');


                Route::get('/tuning/lang/{lang}', 'SettingController@setUserLanguage')->name('tuning.lang');
                Route::get('/tuning/mass/{mass}', 'SettingController@setUserMass')->name('tuning.mass');
                Route::get('/tuning/weight/{weight}', 'SettingController@setUserWeight')->name('tuning.weight');
                Route::get('/tuning/day/{calendar_day}', 'SettingController@setUserDay')->name('tuning.day');

                Route::get('/diagram/index', 'DiagramController@index')->name('diagram');
                Route::get('/diagram/updates', 'DiagramController@updates')->name('diagram.updates');
                Route::post('/diagram/add_exercise', 'DiagramController@addExercise')->name('diagram.add');
                Route::get('/diagram/delete{exercises}', 'DiagramController@delete')->name('diagram.delete');
                Route::get('/diagram/show/{exercises}', 'DiagramController@show')->name('diagram.show');
                Route::get('/diagram/period/{period}', 'DiagramController@getPeriod')->name('diagram.period');
                Route::get('/diagram/kg_km/{km}', 'DiagramController@getKgKm')->name('diagram.kg.km');


                Route::get('/program/programs/{plans}', 'ProgramController@selectPrograms')->name('program');//
                Route::get('/program/show/{program}', 'ProgramController@createTrainFromPlan')->name('program.description');
                Route::get('/program/week/{program}', 'ProgramController@choseProgram')->name('program.week');//
                Route::get('/program/day/{day}', 'ProgramController@choiceFromWorkout')->name('program.day');//
                Route::get('/program/add/{program}', 'ProgramController@addToMyPrograms')->name('program.add');//
                Route::get('/gym_see/{day}/{id}', 'ProgramController@getShareWorkout')->name('gym.see');


                Route::get('/my_program/delete/{program}', 'MyProgramController@delete')->name('my.program.delete');//
                Route::get('/my_program/index', 'MyProgramController@index')->name('my.program.index');//
                Route::post('/my_program/store', 'MyProgramController@store')->name('my.program.store');
                Route::get('/my_program/show/{program}', 'MyProgramController@show')->name('my.program.week');//
                Route::get('/my_train_day/show/{day}', 'MyTrainingDayController@show')->name('my.program.day');//

                Route::post('/my_train_day/store/{program}', 'MyTrainingDayController@store')->name('my.train.day.store');//
                Route::get('/my_train_day/delete/{day}', 'MyTrainingDayController@delete')->name('my.train.day.delete');//


                Route::get('/add_exercise/{exercise}', 'MyExerciseController@addExercise')->name('exercise.add');//
                Route::get('/my_exercise/create/{day}', 'MyExerciseController@create')->name('my.exercise.create');//
                Route::get('/my_exercise/delete/{exercise}', 'MyExerciseController@delete')->name('my.exercise.delete');//
                Route::get('/my_exercise/move/{exercise1}/{exercise2}', 'MyExerciseController@move')->name('my.exercise.move');//
                Route::post('/my_exercise/update/{exercise}', 'MyExerciseController@update')->name('my.exercise.update');//
                Route::get('/my_exercise/edit/{exercise}', 'MyExerciseController@edit')->name('my.exercise.edit');//
                Route::get('/my_exercise/exercise_all', 'MyExerciseController@index')->name('exercises.show');
            }
        );
    }
);
