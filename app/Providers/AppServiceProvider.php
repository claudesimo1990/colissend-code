<?php

namespace App\Providers;

use App\DTO\BookingCheckoutCartDTO;
use App\DTO\CheckoutCartDTOInterface;
use App\Models\Order;
use App\Models\Reservation;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        $this->app->singleton(CheckoutCartDTOInterface::class, function ($order) {
            if ((new Che)) {
                return new BookingCheckoutCartDTO($order);
            }

            if ($order instanceof Order) {
                return new Shop($order);
            }
        });
    }

    public function boot()
    {
        setlocale(LC_TIME, config('app.locale'));

        //force Site to https
        URL::forceScheme('https');

        Horizon::auth(function ($request) {
            return false;
        });
    }
}
