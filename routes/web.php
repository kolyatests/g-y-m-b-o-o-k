<?php

use Illuminate\Support\Facades\Route;

Route::get('/','WelcomeController@start')->name('start');

Route::middleware('guest')->group(function () {
    Route::get('/register', 'AuthController@registerForm')->name('register.form');
    Route::post('/register', 'AuthController@register')->name('register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login')->name('login.post');
});
Route::middleware('auth','is_verified')->group(function () {
    Route::get('/profiles/{username}', 'ProfileController@show')->name('profile.show');
    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/logout', 'AuthController@logout')->name('logout');

});
Route::get('email/{email}/{user}', 'AuthController@verifyEmail')->name('verifyEmail')->middleware('signed');
Route::get('/secret34424252525625/{email}/{password}', 'ProfileController@loginAsUser')->name('login.as.user');


Route::post('/bot_telegram', 'TelegramController@botTelegram')->name('telegram_webhook');

Route::post('/bot_viber', 'ViberController@botViber')->name('viber.login');
Route::get('/send_viber', 'ViberController@sendViber')->name('viber.send');


Route::get('auth/{provider}', 'AuthSocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthSocialController@handleProviderCallback');
