<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/8/20
 * Time: 1:27 AM
 */

namespace App\Models\Traits\Methods;

use App\Models\Account\Movement;

trait MovementMethod
{
    public static function generateCode() {
        $code = mt_rand(1000000000, 9999999999);
        if (static::codeExists($code)) {
            \Log::warning('Movement code already exist. Generating a new one', ['code' => $code]);
            static::generateCode();
        }
        
        return $code;
    }
    
    public static function codeExists($code) {
        return Movement::where('code', $code)->exists();
    }
}
