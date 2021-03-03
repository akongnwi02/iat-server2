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
            'amount' => __('validation.attributes.backend.sales.amount'),
        ];
    }
    
    public function rules()
    {
        return [
            'service_code' => [Rule::exists('services', 'code'), new ServiceAccessRule()],
            'service_number' => 'required|string|gt:3',
            'amount' => 'required|numeric|gt:0',
        ];
    }
}