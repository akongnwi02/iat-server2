<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 11:47 PM
 */

namespace App\Models\Traits\Attributes;


trait MeterAttribute
{
    public function getActiveLabelAttribute()
    {
        if ($this->is_active) {
            if (auth()->user()->can(config('permission.permissions.deactivate_meters'))) {
                return '<a href="'.route('admin.meter.electricity.mark', [
                        $this,
                        0
                    ]).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.services.service.deactivate').'" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">'.__('labels.general.yes').'</span></a>';
            }
            return '<span class="badge badge-success">'.__('labels.general.yes').'</span>';
        }
        
        if (auth()->user()->can(config('permission.permissions.deactivate_meters'))) {
            return '<a href="'.route('admin.meter.electricity.mark', [
                    $this,
                    1
                ]).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.services.service.activate').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
        }
        return '<span class="badge badge-danger">'.__('labels.general.no').'</span>';
    }
}