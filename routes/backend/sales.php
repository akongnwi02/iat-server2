<?php

use App\Http\Controllers\Backend\Sales\SalesController;

Route::group([
    'prefix'     => 'sales',
    'as'         => 'sales.',
    'namespace'  => 'Sales',
], function () {
    
    /*
     * Provision CRUD
     */
    Route::get('/', [SalesController::class, 'index'])
        ->name('index')
        ->middleware('permission:' . config('permission.permissions.read_sales'));
    Route::get('/quote', [SalesController::class, 'create'])
        ->name('quote')
        ->middleware('permission:' . config('permission.permissions.create_sales'));
    
    Route::post('/quote', [SalesController::class, 'quote'])
        ->name('quote')
        ->middleware('permission:' . config('permission.permissions.create_sales'));
    
    Route::get('/{code}/confirm', [SalesController::class, 'confirm'])
        ->where('code', '[A-Za-z0-9]+')
        ->name('confirm')
        ->middleware('permission:' . config('permission.permissions.create_sales'));
    
    Route::get('/download', [SalesController::class, 'download'])
        ->name('download')
        ->middleware('permission:' . config('permission.permissions.read_sales'));
});
