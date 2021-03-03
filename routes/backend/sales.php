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
    Route::get('/create', [SalesController::class, 'create'])
        ->name('create')
        ->middleware('permission:' . config('permission.permissions.create_sales'));
    
    Route::post('/quote', [SalesController::class, 'quote'])
        ->name('quote')
        ->middleware('permission:' . config('permission.permissions.create_sales'));
    
    Route::get('/download', [SalesController::class, 'download'])
        ->name('download')
        ->middleware('permission:' . config('permission.permissions.read_sales'));
});
