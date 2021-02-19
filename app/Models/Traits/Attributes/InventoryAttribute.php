<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/19/21
 * Time: 11:02 PM
 */

namespace App\Models\Traits\Attributes;


trait InventoryAttribute
{
    
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.general.actions').'">
		  '.$this->edit_button.'
		</div>';
    }
    
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.update_inventories'))) {
            return '<a href="'.route('admin.quotes.inventory.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
    }
}