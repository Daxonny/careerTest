<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\School;
//use App\User;

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
        //View::share('schools', School::all());

        // View::composer(['create', 'schools'], function($view) {
        //     $view->with('schools', School::all());
        // });

        // View::composer(['users'], function($view) {
        //     $view->with('users', User::all());
        // });
        
        
    }
}
