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
            'meter_code' => '46100000267',
            'identifier' => '201809011744200046100000267',
            'location' => 'ROOM A3',
            'phone' => '653754334',
            'email' => 'gentledivert@gmail.com',
            'supply_point_id' => SupplyPoint::first()->uuid,
            'provider_id' => Provider::where('name', config('business.meter.provider.hexcell'))->first()->uuid,
            'type' => config('business.meter.type.electricity'),
            'is_active' => true,
            'blocked_reason' => 'requested by landlord',
            'last_vending_date' => now()->toDateTimeString(),
        ]);
        
        Meter::create([
            'meter_code' => '58100002730',
            'identifier' => '58100002730',
            'location' => 'ROOM A3',
            'phone' => '653754334',
            'email' => 'gentledivert@gmail.com',
            'supply_point_id' => SupplyPoint::first()->uuid,
            'provider_id' => Provider::where('name', config('business.meter.provider.stron'))->first()->uuid,
            'type' => config('business.meter.type.electricity'),
            'is_active' => true,
            'blocked_reason' => 'requested by landlord',
            'last_vending_date' => now()->toDateTimeString(),
        ]);
        
        Meter::reguard();
    }
}