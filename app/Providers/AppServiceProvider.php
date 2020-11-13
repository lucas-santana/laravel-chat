<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Essa linha foi necessária por causa do problema com tamanho de index em versões do mysql anteriores à 5.7.7
         * https://laravel.com/docs/8.x/migrations#index-lengths-mysql-mariadb
         */
        Schema::defaultStringLength(191);

        Inertia::share('auth.user', function () {
            return Auth::user();
        });
    }
}
