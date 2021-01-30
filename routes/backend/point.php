<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:28 PM
 */

use App\Http\Controllers\Backend\Point\ElectricSupplyPointController;

Route::group([
    'prefix'     => 'point',
    'as'         => 'point.',
    'namespace'  => 'Point',
], function () {
    
    /*
     * Electric Meter CRUD
     */
    Route::get('electricity', [ElectricSupplyPointController::class, 'index'])
        ->name('electricity.index')
        ->middleware('permission:'.config('permission.permissions.read_supply_points'));
    
    Route::get('electricity/download', [ElectricSupplyPointController::class, 'download'])
        ->name('electricity.download')
        ->middleware('permission:'.config('permission.permissions.read_supply_points'));
    
    Route::get('electricity/map', [ElectricSupplyPointController::class, 'map'])
        ->name('electricity.map')
        ->middleware('permission:'.config('permission.permissions.read_supply_points'));
    
    Route::get('electricity/create', [ElectricSupplyPointController::class, 'create'])
        ->name('electricity.create')
        ->middleware('permission:'.config('permission.permissions.create_supply_points'));
    
    Route::post('electricity', [ElectricSupplyPointController::class, 'create'])
        ->name('electricity.create')
        ->middleware('permission:'.config('permission.permissions.create_supply_points'));
    
    Route::post('electricity', [ElectricSupplyPointController::class, 'store'])
        ->name('electricity.store')
        ->middleware('permission:'.config('permission.permissions.create_supply_points'));
    
    /*
     * Specific Electricity Meter
     */
    Route::group(['prefix' => 'electricity/{point}'], function () {
        
        Route::get('/edit', [ElectricSupplyPointController::class, 'edit'])
            ->name('electricity.edit')
            ->middleware('permission:'.config('permission.permissions.update_supply_points'));
        
        Route::get('/clone', [ElectricSupplyPointController::class, 'clone'])
            ->name('electricity.clone')
            ->middleware('permission:'.config('permission.permissions.create_supply_points'));
        
        Route::get('/clone', [ElectricSupplyPointController::class, 'clone'])
            ->name('electricity.clone')
            ->middleware('permission:'.config('permission.permissions.create_supply_points'));
        
        Route::put('/', [ElectricSupplyPointController::class, 'update'])
            ->name('electricity.update')
            ->middleware('permission:'.config('permission.permissions.update_supply_points'));
    });
});