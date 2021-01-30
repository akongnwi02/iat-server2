<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:39 PM
 */

namespace App\Models\Meter;


use App\Models\Traits\Attributes\MeterAttribute;
use App\Models\Traits\Relationships\MeterRelationship;
use App\Models\Traits\Scopes\MeterScope;
use App\Models\Traits\Uuid;
use Arcanedev\Support\Database\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Meter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meters';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    use Uuid,
        MeterRelationship,
        MeterAttribute,
        MeterScope,
        SoftDeletes,
        Userstamps;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supply_point_id',
        'provider_id',
        'meter_code',
        'phone',
        'email',
        'type',
        'identifier'
    ];
    
    protected $casts = [
        'meter_code' => 'string'
    ];
}