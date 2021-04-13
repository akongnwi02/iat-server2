<?php

/*
 * All route names are prefixed with 'admin.accounting'.
 */
use App\Http\Controllers\Backend\BillPayment\ElectricityBIllPaymentController;

Route::group([
    'prefix'     => 'payments',
    'as'         => 'payments.',
    'namespace'  => 'payments',
], function () {
    
    /*
     * Bill Payment
     */
    Route::get('/electricity', [ElectricityBIllPaymentController::class, 'index'])
        ->name('electricity.index')
        ->middleware('permission:'.config('permission.permissions.read_bill_payments'));
    
    /*
    * Specific Bill Payment
    */
    Route::group(['prefix' => 'electricity/{point}'], function () {
    
        Route::get('edit', [ElectricityBIllPaymentController::class, 'edit'])
            ->name('electricity.edit')
            ->middleware('permission:' . config('permission.permissions.update_bill_payments'));
        
        Route::put('/', [ElectricityBIllPaymentController::class, 'update'])
            ->name('electricity.update')
            ->middleware('permission:' . config('permission.permissions.update_bill_payments'));
    
        Route::get('status/{status}', [QuoteController::class, 'status'])
            ->name('quote.status')
            ->where('status', '[A-Za-z0-9]+')
            ->middleware('permission:' . config('permission.permissions.update_bill_payments'));
    });
});
