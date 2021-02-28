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

class UpdateQuoteRequest extends FormRequest
{
    public function authorize()
    {
        return request()->quote->status == 'created';
    }
    
    public function attributes()
    {
        return [
            'title'                      => __('validation.attributes.backend.quote.quote.title'),
            'customer_name'              => __('validation.attributes.backend.quote.quote.name'),
            'customer_phone'             => __('validation.attributes.backend.quote.quote.phone'),
            'customer_address'           => __('validation.attributes.backend.quote.quote.address'),
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
            'title'                      => ['required', 'string', 'max:191', Rule::unique('quotes', 'title')->ignore(request()->quote, 'uuid')],
            'customer_name'              => 'nullable|string|max:191',
            'customer_phone'             => 'nullable|string|max:191',
            'customer_address'           => 'nullable|string|max:191',
            'description'                => 'nullable|string|max:191',
            'type'                       => 'in:ownership,partnership',
            'inventories'                => ['required', 'array'],
            'inventories.*.inventory_id' => [Rule::exists('inventories', 'uuid')],
            'inventories.*.quantity'     => 'required|numeric|min:0',
            'inventories.*.unit_cost'    => 'required|numeric|min:0',
        ];
    }
}