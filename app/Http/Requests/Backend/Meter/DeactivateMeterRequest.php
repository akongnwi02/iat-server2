<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/20/21
 * Time: 11:56 PM
 */

namespace App\Http\Requests\Backend\Meter;


use Illuminate\Foundation\Http\FormRequest;

class DeactivateMeterRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->company->is_default
            || auth()->user()->company->uuid ==  request()->meter->supply_point->company->uuid;
    }
    
    public function attributes()
    {
        return [
            'comment' => __('validation.attributes.backend.meters.electricity.comment'),
        ];
    }
    
    public function rules()
    {
        return [
            'comment' => ['nullable', 'string', 'max:1024',],
        ];
    }
}