<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:28 PM
 */

use App\Http\Controllers\Backend\Point\SupplyPointController;

Route::group([
    'prefix'     => 'point',
    'as'         => 'point.',
    'namespace'  => 'Point',
], function () {
    
    /*
     * Electric Meter CRUD
     */
    Route::get('electricity', [SupplyPointController::class, 'index'])
        ->name('electricity.index')
        ->middleware('permission:'.config('permission.permissions.read_supply_points'));
    
    Route::get('electricity/create', [SupplyPointController::class, 'create'])
        ->name('electricity.create')
        ->middleware('permission:'.config('permission.permissions.create_supply_points'));
    
    Route::post('electricity', [SupplyPointController::class, 'store'])
        ->name('electricity.store')
        ->middleware('permission:'.config('permission.permissions.create_supply_points'));
    
    /*
     * Specific Electricity Meter
     */
    Route::group(['prefix' => 'electricity/{meter}'], function () {
        
        Route::get('/edit', [SupplyPointController::class, 'edit'])
            ->name('electricity.edit')
            ->middleware('permission:'.config('permission.permissions.update_supply_points'));
        
        Route::put('/', [SupplyPointController::class, 'update'])
            ->name('electricity.update')
            ->middleware('permission:'.config('permission.permissions.update_supply_points'));
    });
});