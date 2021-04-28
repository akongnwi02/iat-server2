<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/11/21
 * Time: 5:50 AM
 */

namespace App\Models\Traits\Methods;


trait SupplyPointMethod
{
    public function getPaymentsForCycle($cycleYear, $cycleMonth)
    {
        return $this->billPayments()
            ->whereHas('cycle', function ($query) use ($cycleYear, $cycleMonth) {
                $query->where('cycle_year', $cycleYear)
                    ->where('cycle_month', $cycleMonth);
            })->get();
    }
    
    public function getSumPaymentsForCycle($cycleYear, $cycleMonth)
    {
        return $this->getPaymentsForCycle($cycleYear, $cycleMonth)->sum('amount');
    }
    
    public function getSumCollectedForCycle($cycleYear, $cycleMonth)
    {
        return $this->sales()
            ->whereYear('created_at', '=', $cycleYear)
            ->whereMonth('created_at', '=', $cycleMonth)
            ->where('status', config('business.transaction.status.success'))
            ->sum('amount');
    }
    
    public function getSumSystemCommissionForCycle($cycleYear, $cycleMonth)
    {
        return $this->sales()
            ->whereYear('created_at', '=', $cycleYear)
            ->whereMonth('created_at', '=', $cycleMonth)
            ->where('status', config('business.transaction.status.success'))
            ->sum('system_commission');
    }
    
    public function getSumIATConsumptionForCycle($cycleYear, $cycleMonth)
    {
        return $this->sales()
            ->whereYear('created_at', '=', $cycleYear)
            ->whereMonth('created_at', '=', $cycleMonth)
            ->where('status', config('business.transaction.status.success'))
            ->sum('units');
    }
    
    public function getENEOConsumptionForCycle($cycleYear, $cycleMonth)
    {
        return $this->getPaymentsForCycle($cycleYear, $cycleMonth)->sum('consumption');
    }
    
    public function getEstimatedNewTariffForCycle($cycleYear, $cycleMonth)
    {
        $eneoConsumption = $this->getENEOConsumptionForCycle($cycleYear, $cycleMonth);
    
        if ($eneoConsumption == 0) {
            return null;
        }
        
        $estimate = ($this->getSumPaymentsForCycle($cycleYear, $cycleMonth) / $eneoConsumption)  + $this->auto_price_margin;
    
        return number_format($estimate, 2);
    }
    
    public function getPaymentsConfirmedStatusForCycle($cycleYear, $cycleMonth)
    {
        $payments = $this->getPaymentsForCycle($cycleYear, $cycleMonth);
    
        if (! $payments->toArray()) {
            return false;
        }
  
        foreach ($payments as $payment) {
            if (! $payment->is_confirmed) {
                return false;
            }
        }
    
        return true;
    }
    
    public function getPaymentsConfirmedStatusForCycleLabel($cycleYear, $cycleMonth)
    {
        if ($this->getPaymentsConfirmedStatusForCycle($cycleYear, $cycleMonth)) {
            return '<a href="'.route('admin.payments.electricity.mark', [$this, 0, 'cycle_year' => $cycleYear, 'cycle_month' => $cycleMonth]).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.unconfirm').'" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">'.__('labels.general.yes').'</span></a>';
        }
        return '<a href="'.route('admin.payments.electricity.mark', [$this, 1, 'cycle_year' => $cycleYear, 'cycle_month' => $cycleMonth]).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.confirm').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
    
    }
}