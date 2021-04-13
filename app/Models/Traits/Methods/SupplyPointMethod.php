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
            })
            ->get();
    }
}