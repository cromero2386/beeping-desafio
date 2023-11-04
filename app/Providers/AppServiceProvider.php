<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OrderTotalCalculatorService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(OrderTotalCalculatorService::class, function ($app) {
            return new OrderTotalCalculatorService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
