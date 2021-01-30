<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/27/21
 * Time: 11:23 PM
 */

namespace App\Models\Traits\Attributes;


trait SupplyPointAttribute
{
    
    public function getIsAutoPriceLabelAttribute()
    {
        if ($this->is_auto_price) {
            return '<i class="fa fa-check"></i>';
        }
        return '<i class="fa fa-times"></i>';
    }
    
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.general.actions').'">
		  ' . $this->edit_button . '
		  ' . $this->clone_button . '
		</div>';
    }
    
    public function getEditButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.update_supply_points'))) {
            return '<a href="'.route('admin.point.electricity.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
    }
    
    
    public function getCloneButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.create_supply_points'))) {
            return '<a href="'.route('admin.point.electricity.clone', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.points.electricity.clone').'" class="btn btn-secondary"><i class="fas fa-copy"></i></a>';
        }
    }
}