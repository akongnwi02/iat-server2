<?php

use App\Models\Meter\Provider;
use Illuminate\Database\Migrations\Migration;

class SeedProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
