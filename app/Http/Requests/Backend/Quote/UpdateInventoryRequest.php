<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/18/21
 * Time: 12:09 AM
 */

namespace App\Http\Requests\Backend\Quote;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInventoryRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->company->isDefault();
    }
    
    public function attributes()
    {
        return [
            'name_en' => __('validation.attributes.backend.quote.inventory.name_en'),
            'name_fr' => __('validation.attributes.backend.quote.inventory.name_fr'),
        ];
    }
    
    public function rules()
    {
        return [
            'name_en' => ['required', 'string', 'max:191', Rule::unique('inventories', 'name_en')->ignore(request()->route('inventory'), 'uuid')],
            'name_fr' => ['required', 'string', 'max:191', Rule::unique('inventories', 'name_fr')->ignore(request()->route('inventory'), 'uuid')],
        ];
    }
}