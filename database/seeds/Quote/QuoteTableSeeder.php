<?php

use App\Models\Quote\Inventory;
use App\Models\Quote\Quote;
use App\Models\Quote\QuoteInventory;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/20/21
 * Time: 12:19 AM
 */

class QuoteTableSeeder extends Seeder
{
    public function run()
    {
        Quote::unguard();
        Quote::create([
            'title' => 'Sample Quote',
            'code' => 'QUOTE001',
            'description' => 'This is a simple description for the quote',
            'status' => 'created',
            'type' => 'ownership'
        ]);
        Quote::reguard();
        
        QuoteInventory::unguard();
        QuoteInventory::create([
            'quote_id' => Quote::first()->uuid,
            'inventory_id' => Inventory::first()->uuid,
        ]);
        QuoteInventory::reguard();
    }
}