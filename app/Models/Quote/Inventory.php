<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/17/21
 * Time: 11:39 PM
 */

namespace App\Models\Quote;


use App\Models\Traits\Attributes\InventoryAttribute;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Inventory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inventories';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    use Uuid,
        InventoryAttribute,
        SoftDeletes,
        Userstamps;
    
    protected $fillable = [
        'name_en',
        'name_fr',
    ];
}