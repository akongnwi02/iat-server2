<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/20/21
 * Time: 12:17 AM
 */

namespace App\Http\Requests\Backend\Quote;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'title'                      => __('validation.attributes.backend.quote.quote.title'),
            'description'                => __('validation.attributes.backend.quote.quote.description'),
            'type'                       => __('validation.attributes.backend.quote.quote.type'),
            'inventories.*.inventory_id' => __('validation.attributes.backend.quote.quote.inventories.material'),
            'inventories.*.quantity'     => __('validation.attributes.backend.quote.quote.inventories.quantity'),
            'inventories.*.unit_cost'    => __('validation.attributes.backend.quote.quote.inventories.unit_cost'),
        ];
    }
    
    public function rules()
    {
        return [
            'title'                      => ['required', 'string', 'max:191', Rule::unique('quotes', 'title')],
            'description'                => 'nullable|string|max:191',
            'type'                       => 'in:ownership,partnership',
            'inventories'                => ['required', 'array'],
            'inventories.*.inventory_id' => [Rule::exists('inventories', 'uuid')],
            'inventories.*.quantity'     => 'required|numeric|min:0',
            'inventories.*.unit_cost'    => 'required|numeric|min:0',
        ];
    }
}