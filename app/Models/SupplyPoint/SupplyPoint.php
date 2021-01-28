<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:14 PM
 */

namespace App\Models\SupplyPoint;


use App\Models\Traits\Attributes\SupplyPointAttribute;
use App\Models\Traits\Relationships\SupplyPointRelationship;
use App\Models\Traits\Uuid;
use Arcanedev\Support\Database\Model;
use Wildside\Userstamps\Userstamps;

class SupplyPoint extends Model
{
    use Uuid,
        SupplyPointRelationship,
        SupplyPointAttribute,
        Userstamps;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supply_points';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
}