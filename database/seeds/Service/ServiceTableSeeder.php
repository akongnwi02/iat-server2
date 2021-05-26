<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/23/20
 * Time: 7:19 PM
 */

use App\Models\Business\Commission;
use App\Models\Service\Category;
use App\Models\Service\Service;
use App\Models\System\Country;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        Service::create([
            'uuid'       => Uuid::generate(4)->string,
            'name'       => 'IAT Electricity Credit',
            'code'       => 'IAT_ELEC_CREDIT',
            'category_id' => \App\Models\Service\Category::where('code', 'electricity')->first()->uuid,
        ]);
        Service::create([
            'uuid'       => Uuid::generate(4)->string,
            'name'       => 'IAT Water Credit',
            'code'       => 'IAT_WATER_CREDIT',
            'category_id' => \App\Models\Service\Category::where('code', 'water')->first()->uuid,
        ]);
    }
}
