<?php

use App\Models\Meter\Meter;
use App\Models\Meter\Provider;
use App\Models\SupplyPoint\SupplyPoint;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:04 PM
 */

class MeterTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        Meter::unguard();
    
        Meter::create([
            'meter_code' => '46021525854',
            'identifier' => '46021525854',
            'phone' => '653754334',
            'email' => 'gentledivert@gmail.com',
            'supply_point_id' => SupplyPoint::first()->uuid,
            'provider_id' => Provider::first()->uuid,
            'type' => config('business.meter.type.electricity'),
            'is_active' => false,
            'blocked_reason' => 'requested by landlord',
            'last_vending_date' => now()->toDateTimeString(),
        ]);
        
        Meter::reguard();
    }
}