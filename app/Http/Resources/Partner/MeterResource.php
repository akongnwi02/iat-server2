<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 5/1/21
 * Time: 3:32 PM
 */

namespace App\Http\Resources\Partner;

use Illuminate\Http\Resources\Json\JsonResource;

class MeterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'meter_code' => $this->meter_code,
            'type' => $this->type,
            'address' => $this->supplyPoint->address,
            'city' => $this->supplyPoint->city,
            'location' => $this->location,
            'customer' => $this->supplyPoint->name,
            'active' => $this->is_active,
            'last_purchase' => $this->last_vending_date,
        ];
    }

}