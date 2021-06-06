<?php

use App\Http\Controllers\Partner\PartnerController;

Route::group(['namespace' => 'Partner', 'prefix' => 'partner'], function () {
    
    // INTERNAL API DOESN'T NEED TO CHANGE
    Route::post('token', [PartnerController::class, 'auth'])
        ->middleware('auth.basic:,username');
    
    // API VERSION 1
    Route::group(['namespace' => 'VersionOne', 'prefix' => 'v1'], function () {
        // protected routes
        Route::group(['middleware' => ['jwt.auth', 'active.confirmed']], function () {
            
            Route::get('/search', [PartnerController::class, 'search']);
    
            Route::post('/buy', [PartnerController::class, 'buy']);
            
            Route::get('/status/{external_id}', [PartnerController::class, 'status']);
        });
        
    });
    
    Route::group(['namespace' => 'VersionTwo', 'prefix' => 'v2'], function () {
    
    });
    
    
});