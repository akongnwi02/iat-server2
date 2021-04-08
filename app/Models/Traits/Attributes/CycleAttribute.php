<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 6:44 PM
 */

namespace App\Models\Traits\Attributes;


trait CycleAttribute
{
    public function getCompleteLabelAttribute()
    {
        if ($this->is_complete) {
            return '<i class="fa fa-check"></i>';
        }
        return '<i class="fa fa-times"></i>';
    }
    
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="' . __('labels.general.actions') . '">
		  	 <div class="btn-group btn-group-sm" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  ' . __('labels.general.more') . '
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">
			  ' . $this->close_or_reopen_cycle_button . '
			</div>
		  </div>
		</div>';
    }
    
    public function getCloseOrReopenCycleButtonAttribute()
    {
        if ($this->is_complete) {
            return '<a href="'.route('admin.administration.cycle.mark', [$this, 0]).'" class="dropdown-item">'.__('buttons.backend.administration.cycle.reopen').'</a>';
        }
        return '<a href="'.route('admin.administration.cycle.mark', [$this, 1]).'" class="dropdown-item">'.__('buttons.backend.administration.cycle.complete').'</a>';
    }
}