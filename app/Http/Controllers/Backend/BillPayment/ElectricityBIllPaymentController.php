<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/28/21
 * Time: 11:28 PM
 */

namespace App\Http\Controllers\Backend\BillPayment;


use App\Http\Controllers\Controller;

class ElectricityBIllPaymentController extends Controller
{
    public function index()
    {
        return view('backend.payments.electricity.index');
    }
}