<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/29/21
 * Time: 12:34 AM
 */

namespace App\Http\Requests\Partner;


use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [];
    }
}