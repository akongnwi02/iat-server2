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
use App\Models\Transaction\Transaction;

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
    
    public function sales()
    {
        return $this->hasMany(Transaction::class, 'meter_id', 'uuid');
    }
}