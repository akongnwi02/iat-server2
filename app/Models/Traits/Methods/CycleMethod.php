<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/28/21
 * Time: 10:35 PM
 */

namespace App\Models\Traits\Methods;


use App\Models\Transaction\Transaction;

trait CycleMethod
{
    public function getSumPayments()
    {
        return Transaction::whereYear('created_at', '=', $this->cycle_year)
            ->whereMonth('created_at', '=', $this->cycle_month)
            ->where('status', config('business.transaction.status.success'))
            ->sum('amount');
    }
    
    public function getSumSystemCommission()
    {
        return Transaction::whereYear('created_at', '=', $this->cycle_year)
            ->whereMonth('created_at', '=', $this->cycle_month)
            ->where('status', config('business.transaction.status.success'))
            ->sum('system_commission');
    }
}