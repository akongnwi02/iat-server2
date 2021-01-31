<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/31/21
 * Time: 7:53 PM
 */

namespace App\Http\Requests\Backend\SupplyPoint;


use Illuminate\Foundation\Http\FormRequest;

class ShowSupplyPointRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->company->is_default
            || auth()->user()->company->uuid ==  request()->point->company->uuid;
    }
    
    public function rules()
    {
        return [];
    }
}