<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/31/21
 * Time: 8:54 PM
 */

namespace App\Http\Requests\Backend\SupplyPoint;


use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplyPointGpsCoordinatesRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->company->is_default
            || auth()->user()->company->uuid == request()->point->company->uuid;
    }
    
    
    public function attributes()
    {
        return [
            'gps_lat'  => __('validation.attributes.backend.points.electricity.gps_lat'),
            'gps_long' => __('validation.attributes.backend.points.electricity.gps_long'),
        ];
    }
    
    public function rules()
    {
        return [
            'gps_lat'  => ['required', 'numeric', 'between:-90,90'],
            'gps_long' => ['required', 'numeric', 'between:-180,180'],
        ];
    }
    
}