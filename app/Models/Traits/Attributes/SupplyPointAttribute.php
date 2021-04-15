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
    
    public function getIsInternalLabelAttribute()
    {
        if ($this->is_internal) {
            return '<i class="fa fa-check"></i>';
        }
        return '<i class="fa fa-times"></i>';
    }
    
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="' . __('labels.general.actions') . '">
		  ' . $this->edit_button . '
		  ' . $this->clone_button . '
		  ' . $this->map_pointer_button . '
		  	 <div class="btn-group btn-group-sm" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  ' . __('labels.general.more') . '
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">
			  ' . $this->update_gps_coordinates_button . '
			</div>
		  </div>
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
    
    public function getMapPointerButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.read_supply_points'))) {
            return '<a href="'.route('admin.point.electricity.map', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.points.electricity.map').'" class="btn btn-facebook"><i class="fas fa-map-marker-alt"></i></a>';
        }
    }
    
    public function getUpdateGpsCoordinatesButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.update_meters'))) {
            return '<a href="'.route('admin.point.electricity.editMap', $this).'" class="dropdown-item">'.__('buttons.backend.points.electricity.edit_map').'</a>';
        }
    }
}