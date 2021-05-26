<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 5/26/21
 * Time: 1:24 AM
 */

namespace App\Http\Requests\Backend\Meter;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaintainMeterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function attributes()
    {
        return [
            'meter_code'      => __('validation.attributes.backend.meters.electricity.meter_code'),
        ];
    }
    
    public function rules()
    {
        return [
            'type' => 'in:clear_credit,clear_tamper',
            'meter_code' => [Rule::exists('meters', 'meter_code')]
        ];
    }
}