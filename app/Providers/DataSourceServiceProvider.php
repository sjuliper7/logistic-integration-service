<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DataSource;
class DataSourceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('DataSource', function () {
            return new DataSource();
        });
    }
}
