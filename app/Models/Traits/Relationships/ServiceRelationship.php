<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/13/20
 * Time: 10:23 PM
 */

namespace App\Models\Traits\Relationships;

use App\Models\Account\BillerPayment;
use App\Models\Account\PayoutType;
use App\Models\Auth\User;
use App\Models\Business\Commission;
use App\Models\Business\CommissionDistribution;
use App\Models\Company\Company;
use App\Models\Company\CompanyService;
use App\Models\Service\Category;
use App\Models\Service\Item;
use App\Models\Service\PaymentMethod;
use App\Models\Transaction\Transaction;

trait ServiceRelationship
{
    public function deactivator()
    {
        return $this->hasOne(User::class, 'uuid', 'deactivated_by_id');
    }
    
    public function category()
    {
        return $this->hasOne(Category::class, 'uuid', 'category_id');
    }
    
    public function items()
    {
        return $this->hasMany(Item::class, 'service_id', 'uuid');
    }
    
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_service', 'service_id', 'company_id', 'uuid')
            ->withTimestamps()
            ->using(CompanyService::class)
            ->as('specific')
            ->withPivot([
                'is_active',
                'customercommission_id',
                'providercommission_id',
                'commission_distribution_id',
            ]);
    }
    
    public function customer_commission()
    {
        return $this->belongsTo(Commission::class, 'customercommission_id', 'uuid');
    }
    
    public function provider_commission()
    {
        return $this->belongsTo(Commission::class, 'providercommission_id', 'uuid');
    }
    
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'uuid', 'service_id');
    }
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'service_id', 'uuid');
    }
    
    public function collections()
    {
        return $this->hasMany(BillerPayment::class, 'service_id', 'uuid')->where('type_id', PayoutType::where('name', config('business.payout.type.collection'))->first()->uuid);
    }
    
    public function provisions()
    {
        return $this->hasMany(BillerPayment::class, 'service_id', 'uuid')->where('type_id', PayoutType::where('name', config('business.payout.type.provision'))->first()->uuid);
    }
    
    public function commission_distribution()
    {
        return $this->belongsTo(CommissionDistribution::class, 'commission_distribution_id', 'uuid');
    }
    
}

