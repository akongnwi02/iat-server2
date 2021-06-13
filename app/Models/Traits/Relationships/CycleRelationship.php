<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/13/21
 * Time: 1:49 AM
 */

namespace App\Models\Traits\Relationships;


use App\Models\Payment\BillPayment;

trait CycleRelationship
{
    public function billPayments()
    {
        return $this->hasMany(BillPayment::class, 'cycle_id', 'uuid');
    }
}