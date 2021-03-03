<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/3/21
 * Time: 9:58 PM
 */

namespace App\Rules\Sales;

use App\Exceptions\GeneralException;
use App\Models\Service\Service;
use Illuminate\Contracts\Validation\Rule;

class ServiceAccessRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     * @throws GeneralException
     */
    public function passes($attribute, $value)
    {
        $service = Service::where('services.code', $value)->first();
        
        // service should exist
        if (! $service) {
            throw new GeneralException(__('exceptions.backend.sales.service_invalid'));
        }
        
        // service is deactivated for everybody
        if (! $service->is_active || ! $service->category->is_active) {
            throw new GeneralException(__('exceptions.backend.sales.service_inactive'));
        }
        
        // service should be active for the company
        if (auth()->user()->company) {
            if (auth()->user()->company->services()->where('services.code', $value)->exists()
                && auth()->user()->company->services()->where('services.code', $value)->first()->specific->is_active) {
                return true;
            }
        }
        throw new GeneralException(__('exceptions.backend.sales.service_forbidden'));
    
    }
    
    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return 'This service is not activated for you. Please contact support';
    }
}