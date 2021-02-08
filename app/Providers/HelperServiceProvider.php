<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        //  подключаем один хелпер

//        $file = app_path('Helpers/Helpers.php');
//
//        if (file_exists($file)) {
//            require_once($file);
//        }

        //  подключаем все хелперы в папке Helpers

        foreach (glob(app_path().'/Helpers/*.php') as $file) {
            require_once $file;
        }
    }

    public function boot()
    {
        //
    }
}
