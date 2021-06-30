<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/20/20
 * Time: 12:37 AM
 */

namespace App\Models\Traits\Scopes;


use App\Models\Company\Company;
use Carbon\Carbon;

trait TransactionScope
{
    public function scopeStartDate($query, $date)
    {
        return $query->where('created_at', '>=', Carbon::parse($date));
    }
    
    public function scopeEndDate($query, $date)
    {
        return $query->where('created_at', '<', Carbon::parse($date)->addDay());
    }
    
    public function scopeSupplyPointCompany($query, Company $company)
    {
        return $query->whereIn('supply_point_id', $company->points->pluck('uuid')->all());
    }
}
