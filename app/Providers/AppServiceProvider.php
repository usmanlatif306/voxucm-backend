<?php

namespace App\Providers;

use App\Models\Content\Home;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        $home = Home::get()->first();
        view()->composer('layouts.master', function ($view) {
            $view->with('orders',  auth()->user() ? auth()->user()->orders : [])->with('navlogo', Home::get()->first()->navlogo);
        });
    }
}
