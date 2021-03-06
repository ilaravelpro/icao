<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:26 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1/icao')->middleware('auth:api')->group(function () {
    if (icao('routes.api.requests.status', true)){
        Route::apiResource('requests', 'ICAORequestController', ['as' => 'api.icao.requests','except' => ['store','update','destroy']]);
        Route::post('requests/{service?}/{server?}/{method?}', 'ICAORequestController@store')->name('api.icao.requests.store');
    }
    if (icao('routes.api.notams.status', true))
        Route::apiResource('notams', 'ICAONotamController', ['as' => 'api.icao.notams','except' => ['store','update','destroy']]);
});
