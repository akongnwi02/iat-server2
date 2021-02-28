<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/17/21
 * Time: 11:39 PM
 */

namespace App\Models\Quote;


use App\Models\Traits\Attributes\QuoteAttribute;
use App\Models\Traits\Relationships\QuoteRelationship;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Quote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quotes';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    use Uuid,
        QuoteAttribute,
        QuoteRelationship,
        SoftDeletes,
        Userstamps;
    
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'title',
        'code',
        'description',
        'status',
        'type',
    ];
}