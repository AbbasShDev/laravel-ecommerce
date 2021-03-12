<?php

namespace App\Providers;

use App\Search\ProductTrans;
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
        if (request()->segment(1) == 'admin') {
            app()->setLocale('en');
        } else {
            app()->setLocale(request()->segment(1));
        }

    }
}
