<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/25/20
 * Time: 7:20 PM
 */

namespace App\Http\Requests\Backend\Services\Commission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommissionRequest extends FormRequest
{
    
    public function authorize()
    {
        return auth()->user()->company->isDefault();
    }
    
    public function attributes()
    {
        return [
            'name'        => __('validation.attributes.backend.services.commission.name'),
            'description' => __('validation.attributes.backend.services.commission.description'),
            'currency_id' => __('validation.attributes.backend.services.commission.description'),
        ];
    }
    
    public function rules()
    {
        return [
            'name'        => ['required', 'string', Rule::unique('commissions', 'name')],
            'description' => 'required|string|max:191',
            'currency_id' => ['required', Rule::exists('currencies', 'uuid')]
        ];
    }
}
