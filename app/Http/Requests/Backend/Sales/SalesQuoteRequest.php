<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/3/21
 * Time: 9:20 PM
 */

namespace App\Http\Requests\Backend\Sales;


use App\Rules\Sales\ServiceAccessRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalesQuoteRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'service_code' => __('validation.attributes.backend.sales.service_code'),
            'service_number' => __('validation.attributes.backend.sales.service_number'),
            'currency_code' => __('validation.attributes.backend.sales.currency_code'),
            'amount' => __('validation.attributes.backend.sales.amount'),
        ];
    }
    
    public function rules()
    {
        return [
            'currency_code' => ['required', Rule::exists('currencies', 'code')],
            'service_code' => ['required', Rule::exists('services', 'code'), new ServiceAccessRule()],
            'service_number' => ['required', Rule::exists('meters', 'meter_code')],
            'amount' => 'required|numeric|gt:0',
        ];
    }
}