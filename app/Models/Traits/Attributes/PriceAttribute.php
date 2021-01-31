<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/18/20
 * Time: 12:02 PM
 */

namespace App\Models\Traits\Attributes;


trait PriceAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.update_prices'))) {
            return '<a href="'.route('admin.services.price.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
    }
    
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.general.actions').'">
		  '.$this->edit_button.'
		</div>';
    }
    
//    /**
//     * @return string
//     */
//    public function getLogoLabelAttribute()
//    {
//        $url = url($this->service_logo ?: 'img/backend/brand/logo/logo-company-profile.png');
//
//        return "<img class='navbar-brand-full img-fluid' src='$url' width='30' height='30' style='border-radius: 50%' alt='$this->name'>";
//    }
//
//    public function getCategoryLogoAttribute()
//    {
//        if ($this->logo_url) {
//            return 'storage/'. $this->logo_url;
//        }
//        return false;
//    }
    
}
