<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:28 PM
 */

use App\Http\Controllers\Backend\Meter\ElectricMeterController;

Route::group([
    'prefix'     => 'meter',
    'as'         => 'meter.',
    'namespace'  => 'Meter',
], function () {
    
    /*
     * Service CRUD
     */
    Route::get('electricity', [ElectricMeterController::class, 'index'])
        ->name('electricity.index')
        ->middleware('permission:'.config('permission.permissions.read_meters'));
    
    Route::get('electricity/create', [ElectricMeterController::class, 'create'])
        ->name('electricity.create')
        ->middleware('permission:'.config('permission.permissions.create_meters'));
    
    Route::post('electricity', [ElectricMeterController::class, 'store'])
        ->name('electricity.store')
        ->middleware('permission:'.config('permission.permissions.create_meters'));
    
});