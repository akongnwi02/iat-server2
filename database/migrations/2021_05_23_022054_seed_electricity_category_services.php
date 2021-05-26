<?php

use Illuminate\Database\Migrations\Migration;

class SeedElectricityCategoryServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('services')->insert([
            'uuid'       => Uuid::generate(4)->string,
            'name'       => 'IAT Electricity Credit',
            'code'       => 'IAT_ELEC_CREDIT',
            'category_id' => \App\Models\Service\Category::where('code', 'electricity')->first()->uuid,
        ]);
        \DB::table('services')->insert([
            'uuid'       => Uuid::generate(4)->string,
            'name'       => 'IAT Water Credit',
            'code'       => 'IAT_WATER_CREDIT',
            'category_id' => \App\Models\Service\Category::where('code', 'water')->first()->uuid,
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
