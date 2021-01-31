<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:14 PM
 */

namespace App\Models\SupplyPoint;


use App\Models\Traits\Attributes\PriceAttribute;
use App\Models\Traits\Uuid;
use Arcanedev\Support\Database\Model;
use Wildside\Userstamps\Userstamps;

class Price extends Model
{
    use Uuid,
        PriceAttribute,
        Userstamps;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prices';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    protected $fillable = [
        'name',
        'amount',
        'description',
    ];
}