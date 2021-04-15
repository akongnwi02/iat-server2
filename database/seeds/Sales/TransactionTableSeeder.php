<?php

use App\Models\Auth\User;
use App\Models\Business\Commission;
use App\Models\Company\Company;
use App\Models\Meter\Meter;
use App\Models\Service\Category;
use App\Models\Service\Service;
use App\Models\SupplyPoint\Price;
use App\Models\SupplyPoint\SupplyPoint;
use App\Models\System\Currency;
use App\Models\Transaction\Transaction;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/14/21
 * Time: 10:14 PM
 */
class TransactionTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        Transaction::unguard();
        
        Transaction::create([
            'code'                          => Transaction::generateCode(),
            'amount'                        => 1000,
            'amount_with_vat'               => 1050,
            'user_id'                       => User::first()->uuid,
            'company_id'                    => Company::first()->uuid,
            'service_id'                    => Service::first()->uuid,
            'category_id'                   => Category::first()->uuid,
            'meter_id'                      => Meter::first()->uuid,
            'supply_point_id'               => SupplyPoint::first()->uuid,
            'category_code'                 => Category::first()->code,
            'service_code'                  => Service::first()->code,
            'currency_code'                 => Currency::first()->code,
            'destination'                   => Meter::first()->meter_code,
            'paymentaccount'                => User::first()->account->code,
            'is_account_credit'             => false,
            'status'                        => config('business.transaction.status.success'),
            'to_be_verified'                => false,
            'error_code'                    => null,
            'error'                         => null,
            'message'                       => 'Transaction generated successfully',
            'type'                          => Meter::first()->type,
            'units'                         => 295,
            'price'                         => 94,
            'vat'                           => 50,
            'token'                         => '9547 8745 4785 1234 7895',
            'customer_servicecommission_id' => Commission::first()->uuid,
            'price_id'                      => Price::first()->uuid,
            'system_commission'             => 750,
            'reversed_at'                   => null,
            'completed_at'                  => null,
            'customer_phone'                => '653754334',
        ]);
        
        Transaction::reguard();
        
    }
}