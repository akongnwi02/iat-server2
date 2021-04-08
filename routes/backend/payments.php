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
    
});
