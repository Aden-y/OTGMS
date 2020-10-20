<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
     /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        Blade::if('admin', function (){
            return Auth::check() && Auth::user()->isAdmin();
        });

        Blade::if('tourist', function (){
            return Auth::check() && Auth::user()->isTourist();
        });

        Blade::if('guide', function (){
            return Auth::check() && Auth::user()->isGuide();
        });


    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }



}
