<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/21/21
 * Time: 1:21 AM
 */

namespace App\Http\Requests\Backend\Quote;


use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteStatusRequest extends FormRequest
{
    public function authorize()
    {
        return request()->quote->status == 'created' && in_array(request()->status, ['approved', 'rejected']);
    }
    
    public function rules()
    {
        return [];
    }
}