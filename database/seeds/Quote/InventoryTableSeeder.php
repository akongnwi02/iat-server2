<?php

use App\Models\Quote\Inventory;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/19/21
 * Time: 10:57 PM
 */

class InventoryTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        Inventory::unguard();
    
        Inventory::create([
            'name_en' => 'Labour',
            'name_fr' => 'Main d\'oeuvre',
        ]);
    
        Inventory::reguard();
    }
}