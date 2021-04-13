<?php

use App\Models\Payment\Cycle;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 1:55 PM
 */

class CycleTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        Cycle::unguard();
        Cycle::create([
            'cycle_month' => now()->month,
            'cycle_year' => now()->year,
            'is_complete' => false,
        ]);
        Cycle::reguard();
    }
}