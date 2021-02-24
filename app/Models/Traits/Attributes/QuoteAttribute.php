<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/23/21
 * Time: 10:49 PM
 */

namespace App\Models\Traits\Attributes;


trait QuoteAttribute
{
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.general.actions').'">
		  ' . $this->edit_button. '
		  ' . $this->download_button . '
		</div>';
    }
    
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.update_quotes'))) {
            return '<a href="'.route('admin.quotes.quote.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
        }
    }
    
    public function getDownloadButtonAttribute()
    {
        if (auth()->user()->can(config('permission.permissions.read_quotes'))) {
            return '<a href="'.route('admin.quotes.quote.download', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.download').'" class="btn btn-secondary"><i class="fas fa-download"></i></a>';
        }
    }
}