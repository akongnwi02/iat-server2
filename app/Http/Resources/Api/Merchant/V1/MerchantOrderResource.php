<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 7/11/20
 * Time: 1:17 AM
 */

namespace App\Http\Resources\Api\Merchant\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class MerchantOrderResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'code' => $this->code,
            'external_id' => $this->external_id,
            'total_amount' => (float) $this->payment_total_amount,
            'currency_code' => $this->payment_currency_code,
            'system_total_amount' => (float) $this->total_amount,
            'system_currency_code' => $this->currency_code,
            'company' => $this->company->name,
            'company_logo' => $this->company->logo_url,
            'company_address' => $this->company->address,
            'company_website' => $this->company->website,
            'user' => $this->user->name,
            'payment_method' => $this->paymentmethod,
            'payment_account' => $this->paymentaccount,
            'completed_at' => $this->completed ? $this->completed_at->toDatetimeString() : null,
            'notification_url' => $this->notification_url,
            'return_url' => $this->return_url . '?external_id=' . $this->external_id,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at->toDatetimeString(),
            'customer' => [
                'name' => $this->customer_name,
                'phone' => $this->customer_phone,
                'email' => $this->customer_email,
                'address' => $this->customer_address,
            ],
            'items' => MerchantItemResource::collection($this->items),
        ];
    }
}
