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
            ['name' => 'Hexcell'],
            ['name' => 'Calin'],
            ['name' => 'Stron'],
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
