<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/21/21
 * Time: 10:41 AM
 */

namespace App\Models\Traits\Scopes;


use Carbon\Carbon;

trait QuoteScope
{
    public function scopeStartDate($query, $date)
    {
        return $query->where('created_at', '>=', Carbon::parse($date));
    }
    
    public function scopeEndDate($query, $date)
    {
        return $query->where('created_at', '<', Carbon::parse($date)->addDay());
    }
}
