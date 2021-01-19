<?php

use App\Models\SupplyPoint\Price;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:10 PM
 */

class PriceTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        Price::unguard();
    
        Price::create([
            'name' => 'Test Price',
            'description' => 'This is a test price',
            'amount' => 1500
        ]);
        
        Price::reguard();
    }
}