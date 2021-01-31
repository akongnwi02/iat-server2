<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/31/21
 * Time: 11:33 PM
 */

namespace App\Http\Requests\Backend\Services\Price;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePriceRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name'        => __('validation.attributes.backend.services.price.name'),
            'description' => __('validation.attributes.backend.services.price.description'),
            'amount'      => __('validation.attributes.backend.services.price.amount'),
        
        ];
    }
    
    public function rules()
    {
        return [
            'name'        => ['required', 'string', 'max:191', Rule::unique('prices', 'name')],
            'description' => ['required', 'string', 'max:191'],
            'amount'      => ['numeric', 'gte:0']
        ];
    }
}