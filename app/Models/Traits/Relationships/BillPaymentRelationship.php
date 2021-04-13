<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 9:33 PM
 */

namespace App\Models\Traits\Relationships;


use App\Models\Payment\Cycle;
use App\Models\SupplyPoint\SupplyPoint;

trait BillPaymentRelationship
{
    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycle_id', 'uuid');
    }
    
    public function supplyPoint()
    {
        return $this->belongsTo(SupplyPoint::class, 'supply_point_id', 'uuid');
    }
}