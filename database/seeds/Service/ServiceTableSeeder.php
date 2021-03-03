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
            'name' => 'IAT Prepaid Electricity',
            'description' => 'Some quick example text to serve as the service description and make up the bulk of the service\'s content.',
            'code' => 'CORIATELEC',
            'country_id' => Country::first()->uuid,
            'is_active' => true,
            'category_id' => Category::where('code', 'electricity')->first()->uuid,
            'is_prepaid' => false,
            'customercommission_id' => Commission::first()->uuid,
            'providercommission_id' => Commission::first()->uuid,
        ]);
        
        Service::create([
            'name' => 'IAT Prepaid Water',
            'description' => 'Some quick example text to serve as the service description and make up the bulk of the service\'s content.',
            'code' => 'CORIATWAT',
            'country_id' => Country::first()->uuid,
            'is_active' => true,
            'category_id' => Category::where('code', 'water')->first()->uuid,
            'is_prepaid' => true,
            'customercommission_id' => Commission::first()->uuid,
            'providercommission_id' => Commission::first()->uuid,
        ]);
        
        Service::create([
            'name' => 'Cable',
            'description' => 'Some quick example text to serve as the service description and make up the bulk of the service\'s content.',
            'code' => 'IATCABLE',
            'country_id' => Country::first()->uuid,
            'is_active' => true,
            'category_id' => Category::where('code', 'cable')->first()->uuid,
            'is_prepaid' => true,
            'requires_auth'  => false,
            'is_money_withdrawal' => true,
            'customercommission_id' => Commission::first()->uuid,
            'providercommission_id' => Commission::first()->uuid,
        ]);
    }
}
