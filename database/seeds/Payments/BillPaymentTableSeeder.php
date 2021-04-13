<?php

use App\Models\Payment\BillPayment;
use App\Models\Payment\Cycle;
use App\Models\SupplyPoint\SupplyPoint;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/11/21
 * Time: 10:17 AM
 */

class BillPaymentTableSeeder extends Seeder
{
    public function run()
    {
        BillPayment::unguard();
        BillPayment::create([
           'cycle_id' => Cycle::first()->uuid,
           'supply_point_id' => SupplyPoint::first()->uuid,
           'amount' => 1000,
           'payment_ref' => '1245854',
           'is_confirmed' => false,
           'type' => 'electricity',
           'method' => 'bill_settlement',
           'consumption' => 195,
           'bill_number' => '462578547',
           'note' => 'Just a sample comment regarding this payment',
        ]);
        BillPayment::reguard();
    }
}