<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/29/21
 * Time: 1:02 AM
 */

namespace App\Http\Requests\Backend\SupplyPoint;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupplyPointRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name'                => __('validation.attributes.backend.points.electricity.name'),
            'city'                => __('validation.attributes.backend.points.electricity.city'),
            'address'             => __('validation.attributes.backend.points.electricity.address'),
            'phone'               => __('validation.attributes.backend.points.electricity.phone'),
            'email'               => __('validation.attributes.backend.points.electricity.email'),
            'external_identifier' => __('validation.attributes.backend.points.electricity.external_identifier'),
            'meter_no'            => __('validation.attributes.backend.points.electricity.meter_no'),
            'company_id'          => __('validation.attributes.backend.points.electricity.company'),
            'price_id'            => __('validation.attributes.backend.points.electricity.price'),
            'service_charge_id'   => __('validation.attributes.backend.points.electricity.service_charge'),
            'provider_price'      => __('validation.attributes.backend.points.electricity.provider_price2'),
            'is_auto_price'       => __('validation.attributes.backend.points.electricity.is_auto_price'),
            'auto_price_margin'   => __('validation.attributes.backend.points.electricity.auto_price_margin2'),
        ];
    }
    
    public function rules()
    {
        return [
            'name'                => ['required', 'string', 'max:191'],
            'city'                => 'required|string|max:191',
            'address'             => 'nullable|string|max:191',
            'meter_no'            => 'nullable|string|max:191',
            'email'               => 'nullable|email|max:191',
            'phone'               => ['nullable', 'max:191', 'string'],
            'external_identifier' => ['required', 'string', 'max:191', Rule::unique('supply_points', 'external_identifier')],
            'company_id'          => ['required', Rule::exists('companies', 'uuid')],
            'price_id'            => ['nullable', 'required_unless:is_auto_price,1', Rule::exists('prices', 'uuid')],
            'service_charge_id'   => ['nullable', Rule::exists('commissions', 'uuid')],
            'provider_price'      => 'nullable|requiredIf:is_auto_price,1|numeric|gte:0',
            'is_auto_price'       => 'boolean',
            'auto_price_margin'   => 'nullable|numeric|gte:0|requiredIf:is_auto_price,1',
        ];
    }
}