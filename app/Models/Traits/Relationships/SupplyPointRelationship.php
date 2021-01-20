<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/20/21
 * Time: 11:08 PM
 */

namespace App\Models\Traits\Relationships;


use App\Models\Company\Company;

trait SupplyPointRelationship
{
    public function company()
    {
        return $this->hasOne(Company::class, 'uuid', 'company_id');
    }
}