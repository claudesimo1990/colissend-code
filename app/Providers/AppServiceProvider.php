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
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

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

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function boot()
    {
        setlocale(LC_TIME, config('app.locale'));

        //force Site to https
        URL::forceScheme('https');

        Horizon::auth(function ($request) {
            return false;
        });

        $lang = request()->get('lang', 'fr');

        if(in_array($lang,['en','fr'])){
            session(['locale'=> $lang]);
        }
        app()->setLocale(session('locale'));
    }
}
