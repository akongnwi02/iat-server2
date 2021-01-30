<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/22/21
 * Time: 2:07 PM
 */

namespace App\Http\Requests\Backend\Meter;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMeterRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'supply_point_id' => __('validation.attributes.backend.meters.electricity.supply_point'),
            'provider_id'     => __('validation.attributes.backend.meters.electricity.provider'),
            'meter_code'      => __('validation.attributes.backend.meters.electricity.meter_code'),
            'phone'           => __('validation.attributes.backend.meters.electricity.phone'),
            'email'           => __('validation.attributes.backend.meters.electricity.email'),
        ];
    }
    
    public function rules()
    {
        return [
            'meter_code'      => ['required', 'string', 'max:191', Rule::unique('meters', 'meter_code')],
            'supply_point_id' => ['nullable', Rule::exists('supply_points', 'uuid')],
            'provider_id'     => [Rule::exists('providers', 'uuid')],
            'email'           => 'nullable|email|max:191',
            'phone'           => ['nullable', 'max:191', 'string'],
        ];
    }
}