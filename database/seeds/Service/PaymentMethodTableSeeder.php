<?php

use App\Models\Service\PaymentMethod;
use App\Models\Service\Service;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/23/20
 * Time: 6:39 PM
 */
class PaymentMethodTableSeeder extends Seeder
{
    public function run()
    {
//        PaymentMethod::unguard();
//
//        PaymentMethod::create([
//            'name'           => 'MTN',
//            'code'           => 'MTN7487',
//            'is_default'     => false,
//            'is_active'      => true,
//            'is_realtime'    => true,
//            'service_id'     => Service::where('code', 'CORMTNOUT')->first()->uuid,
//            'accountregex'   => null,
//            'placeholder_text' => '2376xxxxxxxx',
//            'description_en' => 'MTN Mobile Money payment. Dial *126# on your mobile to confirm payment',
//            'description_fr' => 'Paiement par MTN Money. Composez *126# sur votre compte pour confirmer le paiement',
//        ]);
//
//        PaymentMethod::reguard();
    }
}
