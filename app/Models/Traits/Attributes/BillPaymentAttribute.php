<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/11/21
 * Time: 10:05 PM
 */

namespace App\Models\Traits\Attributes;


trait BillPaymentAttribute
{
    public function getMethodLabelAttribute()
    {
        switch ($this->method) {
            case 'bill_settlement':
                return __('strings.backend.bill_payment.bill_settlement');
                break;
            case 'money_transfer':
                return __('strings.backend.bill_payment.money_transfer');
                break;
            default:
                return '';
        }
    }
}