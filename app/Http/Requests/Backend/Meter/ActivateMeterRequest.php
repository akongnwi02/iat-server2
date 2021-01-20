<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/20/21
 * Time: 11:03 PM
 */

namespace App\Http\Requests\Backend\Meter;


use Illuminate\Foundation\Http\FormRequest;

class ActivateMeterRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->company->is_default
            || auth()->user()->company->uuid ==  request()->meter->supply_point->company->uuid;
    }
    
    public function rules()
    {
        return [];
    }
}