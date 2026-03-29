<?php

use App\Models\Meter\Provider;
use Illuminate\Database\Migrations\Migration;

class SeedPrismProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Provider::create([
            'name' => config('business.meter.provider.prism'),
        ]);
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
