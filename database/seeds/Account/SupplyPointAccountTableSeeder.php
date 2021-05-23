<?php

use App\Models\Account\Account;
use App\Models\Account\AccountType;
use App\Models\SupplyPoint\SupplyPoint;
use Illuminate\Database\Seeder;

class SupplyPointAccountTableSeeder extends Seeder
{
    public function run()
    {
        Account::unguard();
        
        $pointsWithoutAccounts = SupplyPoint::has('account', '=', 0)->get();
        
        foreach ($pointsWithoutAccounts as $point) {
            Account::create([
                'owner_id' => $point->uuid,
                'type_id' => AccountType::where('name', config('business.account.type.point'))->first()->uuid,
                'code' => Account::generateCode(),
            ]);
        }
        
        Account::reguard();
    }
}
