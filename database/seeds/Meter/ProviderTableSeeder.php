<?php

use App\Models\Meter\Provider;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:05 PM
 */

class ProviderTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        $providers = [
            ['name' => 'Hexcell'],
            ['name' => 'Calin'],
            ['name' => 'Stron'],
        ];
    
        foreach ($providers as $provider) {
            Provider::create($provider);
        }
    }
}