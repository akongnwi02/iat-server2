<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 11:03 PM
 */

namespace App\Repositories\Backend\Payment;


use App\Events\Backend\Payment\BillPaymentConfirmed;
use App\Events\Backend\Payment\BillPaymentUnconfirmed;
use App\Exceptions\GeneralException;
use App\Models\Payment\BillPayment;
use App\Models\SupplyPoint\SupplyPoint;

class BillPaymentRepository
{
    public $cycleRepository;
    
    public function __construct(CycleRepository $cycleRepository)
    {
        $this->cycleRepository = $cycleRepository;
    }
    
    /**
     * @param $point
     * @param $data
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update($point, $data)
    {
        $cycleYear = $data['cycle_year'];
        $cycleMonth = $data['cycle_month'];
        $cycle = $this->cycleRepository->findByYearAndMonth($cycleYear, $cycleMonth);
    
        if (!$cycle) {
            throw new GeneralException(__('exceptions.backend.payment.electricity.cycle_not_found'));
        }
        
        return \DB::transaction(function () use ($point, $data, $cycle) {
    
            $point->billPayments()->where('cycle_id', $cycle->uuid)->delete();
    
            $billPayments = $data['payments'];
            
            foreach ($billPayments as $billPayment) {
                $saved = $point->billPayments()->save(new BillPayment([
                    'cycle_id' => $cycle->uuid,
                    'supply_point_id' => $point->uuid,
                    'type' => $point->type,
                    'is_confirmed' => false,
                    'amount' => $billPayment['amount'],
                    'payment_ref' => $billPayment['payment_ref'],
                    'method' => $billPayment['method'],
                    'consumption' => $billPayment['consumption'],
                    'bill_number' => $billPayment['bill_number'],
                    'note' => $billPayment['note'],
                ]));
    
                if (!$saved) {
                    throw new GeneralException(__('exceptions.backend.payment.electricity.update_error'));
                }
            }
        });
    }
    
    public function  confirm(SupplyPoint $point, $status, $data)
    {
        return \DB::transaction(function () use ($point, $status, $data) {
            $cycleYear = $data['cycle_year'];
            $cycleMonth = $data['cycle_month'];
    
            $payments = $point->getPaymentsForCycle($cycleYear, $cycleMonth);
            if (!$payments) {
                throw new GeneralException(__('exceptions.backend.payment.electricity.no_payment_to_confirm'));
            }
            foreach ($payments as $payment) {
                $payment->is_confirmed = $status;
                if (! $payment->update()) {
                    throw new GeneralException(__('exceptions.backend.payment.electricity.status_error'));
                }
            }
            
            switch ($status) {
                case 0:
                    event(new BillPaymentUnconfirmed($point, $cycleYear, $cycleMonth));
                    break;
                case 1:
                    event(new BillPaymentConfirmed($point, $cycleYear, $cycleMonth));
                    break;
            }
        });
    }
}