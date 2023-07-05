<?php

namespace App\Providers;

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind('ProvinceController', function () {
            return new ProvinceController();
        });

        $this->app->bind('CityController', function () {
            return new CityController();
        });

    }
}
