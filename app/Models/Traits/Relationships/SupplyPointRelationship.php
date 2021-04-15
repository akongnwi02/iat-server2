<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/20/21
 * Time: 11:08 PM
 */

namespace App\Models\Traits\Relationships;


use App\Models\Business\Commission;
use App\Models\Company\Company;
use App\Models\Meter\Meter;
use App\Models\Payment\BillPayment;
use App\Models\SupplyPoint\Price;
use App\Models\Transaction\Transaction;

trait SupplyPointRelationship
{
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'uuid');
    }
    
    public function serviceCharge()
    {
        return $this->belongsTo(Commission::class, 'service_charge_id', 'uuid');
    }
    
    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id', 'uuid');
    }
    
    public function billPayments()
    {
        return $this->hasMany(BillPayment::class, 'supply_point_id', 'uuid');
    }
    
    public function sales()
    {
        return $this->hasMany(Transaction::class, 'supply_point_id', 'uuid');
    }
}