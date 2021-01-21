<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/21/21
 * Time: 11:34 PM
 */

namespace App\Models\Traits\Scopes;


use Carbon\Carbon;

trait MeterScope
{
    public function scopeVendStartDate($query, $date)
    {
        return $query->where('last_vending_date', '>=', Carbon::parse($date));
    }
    
    public function scopeVendEndDate($query, $date)
    {
        return $query->where('last_vending_date', '<', Carbon::parse($date)->addDay());
    }
}