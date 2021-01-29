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
     * Electric Meter CRUD
     */
    Route::get('electricity', [ElectricMeterController::class, 'index'])
        ->name('electricity.index')
        ->middleware('permission:'.config('permission.permissions.read_meters'));
    
    Route::get('electricity/unassigned', [ElectricMeterController::class, 'unassigned'])
        ->name('electricity.unassigned')
        ->middleware('permission:'.config('permission.permissions.read_meters'));
    
    Route::get('electricity/create', [ElectricMeterController::class, 'create'])
        ->name('electricity.create')
        ->middleware('permission:'.config('permission.permissions.create_meters'));
    
    Route::post('electricity', [ElectricMeterController::class, 'store'])
        ->name('electricity.store')
        ->middleware('permission:'.config('permission.permissions.create_meters'));
    
    /*
     * Specific Electricity Meter
     */
    Route::group(['prefix' => 'electricity/{meter}'], function () {
        
        Route::get('/activate', [ElectricMeterController::class, 'activate'])
            ->name('electricity.activate')
            ->middleware('permission:'.config('permission.permissions.deactivate_meters'));
        
        Route::get('/deactivate', [ElectricMeterController::class, 'deactivateForm'])
            ->name('electricity.deactivate.form')
            ->middleware('permission:'.config('permission.permissions.deactivate_meters'));
        
        Route::patch('/deactivate', [ElectricMeterController::class, 'deactivate'])
            ->name('electricity.deactivate')
            ->middleware('permission:'.config('permission.permissions.deactivate_meters'));
    
        Route::get('/edit', [ElectricMeterController::class, 'edit'])
            ->name('electricity.edit')
            ->middleware('permission:'.config('permission.permissions.update_meters'));
        
        Route::get('/clone', [ElectricMeterController::class, 'clone'])
            ->name('electricity.clone')
            ->middleware('permission:'.config('permission.permissions.create_meters'));
    
        Route::put('/', [ElectricMeterController::class, 'update'])
            ->name('electricity.update')
            ->middleware('permission:'.config('permission.permissions.update_meters'));
    });
});