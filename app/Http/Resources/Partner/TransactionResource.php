<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/29/21
 * Time: 12:51 AM
 */

namespace App\Http\Resources\Partner;


use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->uuid,
            'type'           => $this->type,
            'energy'         => $this->units,
            'number'         => $this->code,
            'token'          => $this->token,
            'confirmed_at'   => $this->completed_at ? @$this->completed_at->toDatetimeString() : null,
            'meter_code'     => $this->meter->meter_code,
            'amount'         => $this->amount,
            'external_id'    => $this->external_id
        ];
    }
}