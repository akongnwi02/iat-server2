<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/28/21
 * Time: 11:28 PM
 */

namespace App\Http\Controllers\Backend\BillPayment;


use App\Http\Controllers\Controller;
use App\Models\Payment\BillPayment;
use App\Models\SupplyPoint\SupplyPoint;
use App\Repositories\Backend\Payment\BillPaymentRepository;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;

class ElectricityBIllPaymentController extends Controller
{
    
    /**
     * @param BillPaymentRepository $billPaymentRepository
     * @param SupplyPoint $point
     * @return mixed
     */
    public function edit(BillPaymentRepository $billPaymentRepository, SupplyPoint $point)
    {
        $cycleYear = @request()->cycle_year ?: now()->year;
        $cycleMonth = @request()->cycle_month ?: now()->month;
        
        return view('backend.payments.electricity.edit')
            ->withCycleYear($cycleYear)
            ->withCycleMonth($cycleMonth)
            ->withPoint($point);
    }
    
    /**
     * @param SupplyPointRepository $supplyPointRepository
     * @return mixed
     */
    public function index(SupplyPointRepository $supplyPointRepository)
    {
        $cycleYear = @request()->cycle_year ?: now()->year;
        $cycleMonth = @request()->cycle_month ?: now()->month;
        
        return view('backend.payments.electricity.index')
            ->withPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
                ->with(['billPayments' => function ($q) use($cycleMonth, $cycleYear) {
                    $q->whereHas('cycle', function($q) use($cycleMonth, $cycleYear) {
                        $q->where('cycles.cycle_year', $cycleYear)
                            ->where('cycles.cycle_month', $cycleMonth);
                     });
                }])
                ->paginate())
            ->withCycleYear($cycleYear)
            ->withCycleMonth($cycleMonth);
    }
}