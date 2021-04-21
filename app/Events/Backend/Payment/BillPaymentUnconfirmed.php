<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/20/21
 * Time: 10:50 PM
 */

namespace App\Events\Backend\Payment;


class BillPaymentUnconfirmed
{
    public $point;
    
    public $cycleYear;
    
    public $cycleMonth;
    
    public function __construct($point, $cycleYear, $cycleMonth)
    {
        $this->point      = $point;
        $this->cycleYear  = $cycleYear;
        $this->cycleMonth = $cycleMonth;
    }
}