<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/27/20, 3:24 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function register()
    {
        parent::register();
    }
    public function map(Router $router)
    {
        if (icao('routes.api.status', true)) $this->apiRoutes($router);
    }

    public function apiRoutes(Router $router)
    {
        $router->group([
            'namespace' => '\iLaravel\ICAO\iApp\Http\Controllers\API',
            'prefix' => 'api',
            'middleware' => 'api'
        ], function ($router) {
            require_once(icao_path('routes/api.php'));
        });
    }
}
