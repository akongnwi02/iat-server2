<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/18/20
 * Time: 12:04 PM
 */

namespace App\Models\Traits\Methods;

use App\Models\Transaction\Transaction;
use Carbon\Carbon;

trait CompanyMethod
{
    public function isActive()
    {
        return $this->is_active;
    }
    
    public function isDefault()
    {
        return $this->is_default;
    }
    
    public function getNumberOfUsers()
    {
        return $this->users()->count();
    }
}
