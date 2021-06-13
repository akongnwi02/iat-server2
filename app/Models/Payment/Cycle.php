<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 1:56 PM
 */

namespace App\Models\Payment;


use App\Models\Traits\Attributes\CycleAttribute;
use App\Models\Traits\Methods\CycleMethod;
use App\Models\Traits\Relationships\CycleRelationship;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Cycle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cycles';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    use Uuid,
        Userstamps,
        CycleAttribute,
        CycleRelationship,
        CycleMethod;
    
    protected $fillable = [
        'cycle_month',
        'cycle_year',
        'is_complete',
    ];
}