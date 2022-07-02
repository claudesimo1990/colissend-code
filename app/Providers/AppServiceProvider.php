<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        setlocale(LC_TIME, config('app.locale'));

        //force Site to https
        URL::forceScheme('https');
    }
}
