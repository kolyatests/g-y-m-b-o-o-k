<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
//        Route::patterns(['user' => '[0-9]+',
//                         'program' => '[0-9]+',
//                         'id' => '[0-9]+',
//                         'muscle' => '[0-9]+',
//                         'exercises' => '[0-9]+',
//                         'day_week' => '[0-9]+',
//                         'exercises1' => '[0-9]+',
//                         'exercises2' => '[0-9]+',
//                         'plan' => '[0-9]+',
//            ]);
//        Route::pattern('mass', '1|2|3|4');
//        Route::pattern('weight', '1|2');
//        Route::pattern('period', '1|3|6|12|0');
//        Route::pattern('calendar_day', '0|1');
//        Route::pattern('lang', 'Portugues|Espanol|Deutsch|English|Русский');
//        Route::pattern('day', '\d{4}-\d{2}-\d{2}');
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/moderator.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sport.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/trainer.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/book.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manager.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
