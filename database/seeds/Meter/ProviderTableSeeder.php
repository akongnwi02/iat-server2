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
            ['name' => config('business.meter.provider.hexcell')],
            ['name' => config('business.meter.provider.calin')],
            ['name' => config('business.meter.provider.stron')],
        ];
    
        foreach ($providers as $provider) {
            Provider::create($provider);
        }
    }
}