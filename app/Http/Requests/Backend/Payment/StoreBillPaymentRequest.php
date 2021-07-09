<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 7/9/21
 * Time: 1:34 AM
 */

namespace App\Http\Requests\Backend\Payment;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBillPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function attributes()
    {
        return [
            'payments.*.amount'      => __('validation.attributes.backend.payment.payments.amount'),
            'payments.*.bill_number' => __('validation.attributes.backend.payment.payments.bill_number'),
            'payments.*.payment_ref' => __('validation.attributes.backend.payment.payments.payment_ref'),
            'payments.*.consumption' => __('validation.attributes.backend.payment.payments.consumption'),
            'payments.*.method'      => __('validation.attributes.backend.payment.payments.method'),
            'payments.*.note'        => __('validation.attributes.backend.payment.payments.note'),
            'cycle_year'             => __('validation.attributes.backend.payment.payments.cycle_year'),
            'cycle_month'            => __('validation.attributes.backend.payment.payments.cycle_month'),
            'supply_point_id'        => __('validation.attributes.backend.payment.payments.supply_point'),
        ];
    }
    
    public function rules()
    {
        return [
            'supply_point_id'        => [Rule::exists('supply_points', 'uuid')],
            'cycle_month'            => ['required', 'numeric', 'min:1','max:12'],
            'cycle_year'             => ['required', 'numeric', 'min:2000','max:3000'],
            'payments'               => ['required', 'array'],
            'payments.*.amount'      => ['required', 'numeric', 'min:0'],
            'payments.*.bill_number' => ['required', 'string', 'min:4'],
            'payments.*.payment_ref' => ['nullable', 'string', 'min:4'],
            'payments.*.consumption' => ['required', 'numeric', 'min:0'],
            'payments.*.method'      => ['required', 'string', 'min:0'],
            'payments.*.note'        => ['nullable', 'string', 'min:0'],
        ];
    }
}