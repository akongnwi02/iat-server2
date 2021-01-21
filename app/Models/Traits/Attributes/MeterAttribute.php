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
                return '<a href="'.route('admin.meter.electricity.deactivate', [
                            $this
                        ]).'" data-toggle="tooltip"
                        data-placement="top"
                        title="'.__('buttons.backend.meters.electricity.deactivate').'">
                    <span class="badge badge-success" style="cursor:pointer">'.__('labels.general.yes').'</span></a>';
            }
            return '<span class="badge badge-success">'.__('labels.general.yes').'</span>';
        }
        
        if (auth()->user()->can(config('permission.permissions.deactivate_meters'))) {
            return
                '<a href="'.route('admin.meter.electricity.activate', $this).'"
                        data-toggle="tooltip" data-placement="top"
                        title="'.__('buttons.backend.meters.electricity.activate').'"
                        name="confirm_item">
                    <span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span>
                </a>' .
                '<a tabindex="0" class="badge badge-info" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="'.@$this->blocker->full_name.'" data-content="'.$this->blocked_reason.'" style="cursor:pointer">info</span>';
        }
        return '<span class="badge badge-danger">'.__('labels.general.no').'</span>' .
            '<a tabindex="0" class="badge badge-info" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="'.@$this->blocker->full_name.'" data-content="'.$this->blocked_reason.'" style="cursor:pointer">info</span>';
    }
    
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.general.actions').'">
		  '.$this->edit_button.'
		</div>
    
            <div class="btn-group btn-group-sm" role="group">
                <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.__('labels.general.more').'
                </button>
                <div class="dropdown-menu" aria-labelledby="userActions">
                    '.$this->deactivate_button.'
                    </div>
                </div>
            </div>';
    }
    
    public function getEditButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.update_meters'))) {
            return '<a href="'.route('admin.meter.electricity.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
    }
    
    /**
     * @return string
     */
    public function getDeactivateButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.deactivate_meters'))) {
            return '<a href="'.route('admin.meter.electricity.deactivate', $this).'" class="dropdown-item">'.__('buttons.backend.meters.electricity.deactivate').'</a> ';
        }
    }
}