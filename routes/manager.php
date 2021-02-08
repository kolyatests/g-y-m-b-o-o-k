<?php

use Illuminate\Support\Facades\Route;

Route::name('shop.')->middleware(['is_ban', 'auth', 'locate', 'is_verified'])->group(
    function () {
        Route::group(
            [
                'prefix' => 'shop', 'namespace' => 'Shop',

            ],
            function () {
                Route::get('/user_pre_buy_programs', 'ProgramController@getProgramBasket')->name('user.pre.paid-programs');
                Route::get('/user_buy_programs', 'ProgramController@getPurchasedPrograms')->name('user.paid-programs');
                Route::get('/basket/{plan}', 'ProgramController@buyProgram')->name('user.basket');
                Route::get('/checkout', 'ProgramController@checkout')->name('user.buy');
            }
        );

        Route::middleware('is_manager')->group(
            function () {
                Route::group(
                    [
                        'prefix' => 'shop/manager', 'namespace' => 'Shop\Manager',

                    ],
                    function () {
                        Route::get('/pre_buy_programs', 'ProgramController@getOrderedPrograms')->name('manager.pre.paid-programs');
                        Route::get('/buy_programs', 'ProgramController@getPaidPrograms')->name('manager.paid-programs');
                        Route::get('/users_programs', 'UserController@index')->name('manager.users');
                        Route::get('/programs/{user}/user', 'UserController@show')->name('manager.user.programs');
                        Route::get('/program/pay/{id}', 'ProgramController@checkout')->name('manager.program.pay');
                        Route::get('/program/un_pay/{id}', 'ProgramController@unCheckout')->name('manager.program.unpay');
                        Route::delete('/program/{id}/destroy', 'ProgramController@destroy')->name('manager.program.destroy');
                    }
                );
            }
        );
    }
);
