<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/28/21
 * Time: 10:22 PM
 */

namespace App\Http\Requests\Backend\SupplyPoint;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplyPointRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->company->is_default
            || auth()->user()->company->uuid == request()->point->company->uuid;
    }
    
    public function attributes()
    {
        return [
            'name'                => __('validation.attributes.backend.points.electricity.name'),
            'city'                => __('validation.attributes.backend.points.electricity.city'),
            'address'             => __('validation.attributes.backend.points.electricity.address'),
            'phone'               => __('validation.attributes.backend.points.electricity.phone'),
            'meter_no'            => __('validation.attributes.backend.points.electricity.meter_no'),
            'email'               => __('validation.attributes.backend.points.electricity.email'),
            'external_identifier' => __('validation.attributes.backend.points.electricity.external_identifier'),
            'company_id'          => __('validation.attributes.backend.points.electricity.company'),
            'price_id'            => __('validation.attributes.backend.points.electricity.price'),
            'tax'            => __('validation.attributes.backend.points.electricity.tax'),
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
            'email'               => 'nullable|email|max:191',
            'phone'               => ['nullable', 'max:191', 'string'],
            'meter_no'            => 'nullable|string|max:191',
            'external_identifier' => ['required', 'string', 'max:191', Rule::unique('supply_points', 'external_identifier')->ignore(request()->point, 'uuid')],
            'company_id'          => ['required', Rule::exists('companies', 'uuid')],
            'price_id'            => ['nullable', 'required_unless:is_auto_price,1', Rule::exists('prices', 'uuid')],
            'tax'                 => 'required|numeric|gte:0|lte:100',
            'service_charge_id'   => ['nullable', Rule::exists('commissions', 'uuid')],
            'provider_price'      => 'nullable|requiredIf:is_auto_price,1|numeric|gte:0',
            'is_auto_price'       => 'boolean',
            'auto_price_margin'   => 'nullable|numeric|gte:0|requiredIf:is_auto_price,1',
        ];
    }
}
