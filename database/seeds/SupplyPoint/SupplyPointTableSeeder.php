<?php

use App\Models\Business\Commission;
use App\Models\Company\Company;
use App\Models\SupplyPoint\Price;
use App\Models\SupplyPoint\SupplyPoint;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:10 PM
 */

class SupplyPointTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        SupplyPoint::unguard();
        
        SupplyPoint::create([
            'name' => 'Test supply point',
            'area' => 'Test area',
            'phone' => '+12356',
            'email' => 'gentledivert@gmail.com',
            'address' => '123 church street',
            'contract_number' => 'ENEO Contract',
            'is_auto_price' => false,
            'auto_price' => 12,
            'provider_price' => 13,
            'gps_long' => 125.25,
            'gps_lat' => 85.4,
            'company_id' => Company::first()->uuid,
            'service_charge_id' => Commission::first()->uuid,
            'price_id' => Price::first()->uuid
            
        ]);
        
        SupplyPoint::reguard();
    }
}