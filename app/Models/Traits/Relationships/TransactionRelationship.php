<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/15/20
 * Time: 3:13 PM
 */

namespace App\Models\Traits\Relationships;


use App\Models\Account\Movement;
use App\Models\Auth\User;
use App\Models\Company\Company;
use App\Models\Meter\Meter;
use App\Models\Service\Category;
use App\Models\Service\Service;

trait TransactionRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'uuid');
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'uuid');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'uuid');
    }
    
    public function meter()
    {
        return $this->belongsTo(Meter::class, 'meter_id', 'uuid');
    }
    
    public function movement()
    {
        return $this->belongsTo(Movement::class, 'code', 'transaction_code');
    }
}
