<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:39 PM
 */

namespace App\Models\Traits\Relationships;


use App\Models\Auth\User;
use App\Models\Meter\Provider;
use App\Models\SupplyPoint\SupplyPoint;

trait MeterRelationship
{
    
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'uuid');
    }
    
    public function supplyPoint()
    {
        return $this->belongsTo(SupplyPoint::class, 'supply_point_id', 'uuid');
    }
    
    public function blocker()
    {
        return $this->belongsTo(User::class, 'blocker_id', 'uuid');
    }
}