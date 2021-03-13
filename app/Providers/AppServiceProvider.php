<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

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
        app()->setLocale(request()->segment(1));
//        if (request()->segment(1) == 'admin') {
//            app()->setLocale('en');
//        } else {
//            app()->setLocale(request()->segment(1));
//        }

    }
}
