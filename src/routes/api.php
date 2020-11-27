<?php

Route::namespace('v1')->prefix('v1/icao')/*->middleware('auth:api')*/->group(function () {
    Route::apiResource('requests', 'ICAORequestController', ['as' => 'api.icao.requests','except' => ['store','update','destroy']]);
    Route::post('requests/{service?}/{server?}/{method?}', 'ICAORequestController@store')->name('api.icao.requests.store');
    Route::apiResource('notams', 'ICAONotamController', ['as' => 'api.icao.notams','except' => ['store','update','destroy']]);
});
