<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 8:34 PM
 */

namespace App\Models\Payment;


use App\Models\Traits\Attributes\BillPaymentAttribute;
use App\Models\Traits\Relationships\BillPaymentRelationship;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class BillPayment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bill_payments';
    
    protected $primaryKey = 'uuid';
    
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    use Uuid,
        BillPaymentRelationship,
        BillPaymentAttribute,
        Userstamps;
    
    protected $fillable = [
        'cycle_id',
        'supply_point_id',
        'amount',
        'payment_ref',
        'type',
        'method',
        'consumption',
        'bill_number',
    ];
}