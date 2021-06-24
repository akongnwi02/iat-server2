<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/28/21
 * Time: 11:28 PM
 */

namespace App\Http\Controllers\Backend\BillPayment;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Payment\UpdateBillPaymentRequest;
use App\Models\SupplyPoint\SupplyPoint;
use App\Repositories\Backend\Payment\BillPaymentRepository;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;
use Illuminate\Http\Request;

class ElectricityBIllPaymentController extends Controller
{
    /**
     * @param UpdateBillPaymentRequest $request
     * @param BillPaymentRepository $billPaymentRepository
     * @param SupplyPoint $point
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateBillPaymentRequest $request, BillPaymentRepository $billPaymentRepository, SupplyPoint $point)
    {
        $billPaymentRepository->update($point, $request->input());
    
        return redirect()->route('admin.payments.electricity.index')
            ->withFlashSuccess(__('alerts.backend.payment.electricity.updated'));
        
        
        
        
    }
    
    /**
     * @param SupplyPoint $point
     * @return mixed
     */
    public function edit(SupplyPoint $point)
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
    
    public function mark(SupplyPoint $point, $status, BillPaymentRepository $billPaymentRepository, Request $request)
    {
        $billPaymentRepository->confirm($point, $status, $request->input());
        
        return redirect()->route('admin.payments.electricity.index')
            ->withFlashSuccess(__('alerts.backend.payment.electricity.status_changed'));
    }
}