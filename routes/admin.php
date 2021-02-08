<?php

use Illuminate\Support\Facades\Route;

Route::name('admin.')->middleware(['auth', 'locate', 'is_verified'])->group(
    function () {
        Route::middleware('is_admin')->group(
            function () {
                Route::group(
                    [
                        'prefix' => 'admin',
                        'namespace' => 'Admin',
                    ],
                    function () {
                        Route::resource('/users', 'UserController');
                        Route::resource('/programs', 'ProgramController');
                        Route::resource('/categories.exercises', 'ExerciseController');
                        Route::resource('/categories', 'CategoryController');
                        Route::get('/routes', 'ConfigController@index')->name('routes');



                        Route::get('/bots', 'BotsController@bots')->name('bots');
                        Route::get('/bot/viber', 'BotsController@viber')->name('bot.viber');
                        Route::post('/bot/viber', 'BotsController@viberHook')->name('bot.viber.hook');



                        Route::group(
                            [
                                'prefix' => 'other',
                                'namespace' => 'other',
                            ],
                            function () {
                                Route::resource('/desc_equipment', 'DescEquipmentController');
                                Route::resource('/difficulties', 'DifficultyController');
                                Route::resource('/equipment', 'EquipmentController');
                                Route::resource('/genders', 'GenderController');
                                Route::resource('/muscles', 'MuscleController');
                                Route::resource('/places', 'PlaceController');
                                Route::resource('/purposes', 'PurposeController');
                                Route::resource('/specifics', 'SpecificController');
                                Route::resource('/strings', 'StringController');


                            }
                        );
                        Route::get('reset', 'ResetController@reset')->name('reset');
                        Route::get('down_app', 'ResetController@downApp')->name('down.app');
                        Route::get('up_app', 'ResetController@upApp')->name('up.app');
                    }
                );
            }
        );
    }
);
