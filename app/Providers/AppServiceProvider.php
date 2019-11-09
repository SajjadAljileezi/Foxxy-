<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Lead;
use App\Client;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         View::composer(['layouts.app'], function ($view) {
            $current_date = Carbon::now()->timezone('America/Los_Angeles')->format('d');
            $current_month = Carbon::now()->timezone('America/Los_Angeles')->format('m');
            $leadeds=Lead::whereDay('time', '=', $current_date)
            ->whereMonth('time', '=', $current_month)->get();
            $view->with('leadeds', $leadeds);
        });


        View::composer(['layouts.app'], function ($view) {
            $clentss=Client:: where('is_call_back', true)->get();
            $view->with('clentss', $clentss);
        });


    }
}
