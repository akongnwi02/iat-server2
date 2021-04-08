<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 7:48 PM
 */

namespace App\Http\Requests\Backend\Payment;


use Illuminate\Foundation\Http\FormRequest;

class CycleStatusRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->company->isDefault();
    }
    
    public function rules()
    {
        return [];
    }
}