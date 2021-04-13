<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:14 PM
 */

namespace App\Models\SupplyPoint;


use App\Models\Traits\Attributes\SupplyPointAttribute;
use App\Models\Traits\Methods\SupplyPointMethod;
use App\Models\Traits\Relationships\SupplyPointRelationship;
use App\Models\Traits\Uuid;
use Arcanedev\Support\Database\Model;
use Wildside\Userstamps\Userstamps;

class SupplyPoint extends Model
{
    use Uuid,
        SupplyPointRelationship,
        SupplyPointAttribute,
        SupplyPointMethod,
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
    
    protected $fillable = [
        'name',
        'city',
        'address',
        'phone',
        'email',
        'type',
        'external_identifier',
        'company_id',
        'service_charge_id',
        'provider_price',
        'price_id',
        'is_auto_price',
        'tax',
        'auto_price_margin',
        'meter_no',
    ];
    
    protected $casts = [
        'gps_lat' => 'double',
        'gps_long' => 'double',
        'tax' => 'double',
    ];
}