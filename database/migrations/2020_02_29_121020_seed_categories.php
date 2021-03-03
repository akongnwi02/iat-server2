<?php

use Illuminate\Database\Migrations\Migration;

class SeedCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('categories')->insert([
            'uuid'       => Uuid::generate(4)->string,
            'name'       => 'Water Services',
            'code'       => 'water',
            'is_active' => true,
        ]);
        \DB::table('categories')->insert([
            'uuid'       => Uuid::generate(4)->string,
            'name'       => 'Electricity Services',
            'code'       => 'electricity',
            'is_active' => true,
        ]);
        \DB::table('categories')->insert([
            'uuid'       => Uuid::generate(4)->string,
            'name'       => 'Cable Services',
            'code'       => 'cable',
            'is_active' => true,
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
