<?php

namespace iLaravel\ICAO\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(icao_path('config/icao.php'), 'ilaravel.icao');

        if($this->app->runningInConsole())
        {
            if (icao('database.migrations.include', true)) $this->loadMigrationsFrom(icao_path('database/migrations'));
        }
    }

    public function register()
    {
        parent::register();
    }
}
