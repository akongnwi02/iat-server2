<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/17/21
 * Time: 11:42 PM
 */

namespace App\Models\Quote;


use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuoteInventory extends Pivot
{
    use Uuid;
    
    protected $table = 'company_service';
    
    public $incrementing = false;
}