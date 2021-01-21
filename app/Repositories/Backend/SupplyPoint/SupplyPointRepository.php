<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/21/21
 * Time: 9:47 PM
 */

namespace App\Repositories\Backend\SupplyPoint;


use App\Models\SupplyPoint\SupplyPoint;
use Spatie\QueryBuilder\QueryBuilder;

class SupplyPointRepository
{
    public function getAllSupplyPoints()
    {
        $supplyPoints = QueryBuilder::for(SupplyPoint::class)
            ->allowedSorts('supply_points.created_at')
            ->defaultSort( '-supply_points.created_at');
        
        if (! auth()->user()->company->is_default) {
            $supplyPoints->where('company_id', auth()->user()->company->uuid);
        }
        
        return $supplyPoints;
    }
}