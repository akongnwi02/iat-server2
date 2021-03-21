<?php

use App\Http\Controllers\Backend\Quote\InventoryController;
use App\Http\Controllers\Backend\Quote\QuoteController;

Route::group([
    'prefix'     => 'quotes',
    'as'         => 'quotes.',
    'namespace'  => 'Quotes',
], function () {
    
    /*
     * Quote CRUD
     */
    Route::get('quote', [QuoteController::class, 'index'])
        ->name('quote.index')
        ->middleware('permission:'.config('permission.permissions.read_quotes'));
    
    Route::get('quote/create', [QuoteController::class, 'create'])
        ->name('quote.create')
        ->middleware('permission:'.config('permission.permissions.create_quotes'));
    
    Route::post('quote', [QuoteController::class, 'store'])
        ->name('quote.store')
        ->middleware('permission:'.config('permission.permissions.create_quotes'));
    
    /*
     * Specific Quote
     */
    Route::group(['prefix' => 'quote/{quote}'], function () {
        // Company
        Route::get('/', [QuoteController::class, 'show'])
            ->name('quote.show')
            ->middleware('permission:'.config('permission.permissions.read_quotes'));
    
        Route::get('edit', [QuoteController::class, 'edit'])
            ->name('quote.edit')
            ->middleware('permission:'.config('permission.permissions.update_quotes'));
       
        Route::get('download', [QuoteController::class, 'download'])
            ->name('quote.download')
            ->middleware('permission:'.config('permission.permissions.read_quotes'));
    
        Route::put('/', [QuoteController::class, 'update'])
            ->name('quote.update')
            ->middleware('permission:'.config('permission.permissions.update_quotes'));
        
        Route::get('status/{status}', [QuoteController::class, 'status'])
            ->name('quote.status')
            ->where('status', '[A-Za-z0-9]+')
            ->middleware('permission:'.config('permission.permissions.update_quotes'));
    });
    
    /*
     * Inventory CRUD
     */
    Route::get('inventory', [InventoryController::class, 'index'])
        ->name('inventory.index')
        ->middleware('permission:'.config('permission.permissions.read_inventories'));
    
    Route::get('inventory/create', [InventoryController::class, 'create'])
        ->name('inventory.create')
        ->middleware('permission:'.config('permission.permissions.create_inventories'));
    
    Route::post('inventory', [InventoryController::class, 'store'])
        ->name('inventory.store')
        ->middleware('permission:'.config('permission.permissions.create_inventories'));
    
    /*
     * Specific Inventory
     */
    Route::group(['prefix' => 'inventory/{inventory}'], function () {
        Route::get('edit', [InventoryController::class, 'edit'])
            ->name('inventory.edit')
            ->middleware('permission:'.config('permission.permissions.update_inventories'));
        
        Route::put('/', [InventoryController::class, 'update'])
            ->name('inventory.update')
            ->middleware('permission:'.config('permission.permissions.update_inventories'));
    });
    
});