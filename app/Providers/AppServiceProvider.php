<?php

namespace App\Providers;

use App\Models\Book\BookPost;
use App\Models\Book\BookComment;
use App\Models\Book\BookCategory;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path('../public_html');
        });
    }

    public function boot()
    {
        User::observe(UserObserver::class);
        $registrar = new ResourceRegistrar($this->app['router']);
        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () use ($registrar) {
            return $registrar;
        });
        $this->app->afterResolving('migrator', function ($migrator) {
            foreach ((array) config('database.migrations_paths', []) as $path) {
                $migrator->path($path);
            }
        });
        view()->composer('book.user._sidebar', function ($view) {
            $view->with('popularPosts', BookPost::getPopularPosts());
            $view->with('featuredPosts', BookPost::where('is_featured', 1)->orderBy('date', 'desc')->take(3)->get());
            $view->with('categories', BookCategory::all());
        });
        view()->composer('book.moderator._sidebar', function ($view) {
            $view->with('newCommentsCount', BookComment::where('status', 0)->count());
        });
    }
}
