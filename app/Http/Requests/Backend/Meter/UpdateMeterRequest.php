<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/21/21
 * Time: 3:47 PM
 */

namespace App\Http\Requests\Backend\Meter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMeterRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->company->is_default
            || auth()->user()->company->uuid ==  request()->meter->supply_point->company->uuid;
    }
    
    public function attributes()
    {
        return [
            'supply_point_id' => __('validation.attributes.backend.meters.electricity.supply_point'),
            'phone' => __('validation.attributes.backend.meters.electricity.phone'),
            'email' => __('validation.attributes.backend.meters.electricity.email'),
        ];
    }
    
    public function rules()
    {
        return [
            'supply_point_id'      => ['nullable', Rule::exists('supply_points', 'uuid')],
            'email'                => 'nullable|email|max:191',
            'phone'                => ['nullable', 'max:191', 'string'],
        ];
    }
}