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
		  ' . $this->download_button . '
		  ' . $this->edit_button. '
		  ' . $this->reject_button. '
		  ' . $this->approve_button . '
		</div>';
    }
    
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if ($this->status != 'created') {
            return '';
        }
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
    
    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 'rejected':
                return '<span class="badge badge-danger">'.__($this->status).'</span>';
            
            case 'approved':
                return '<span class="badge badge-success">'.__($this->status).'</span>';
                
            default:
                return '<span class="badge badge-secondary">'.__($this->status).'</span>';
        }
    }
    
    public function getApproveButtonAttribute()
    {
        if ($this->status != 'created') {
            return '';
        }
        if (auth()->user()->can(config('permission.permissions.update_quotes'))) {
            return '<a href="'.route('admin.quotes.quote.status', [$this, 'approved']).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.quotes.approve').'" class="btn btn-success"><i class="fas fa-check-circle"></i></a>';
        }
    }
    
    public function getRejectButtonAttribute()
    {
        if ($this->status != 'created') {
            return '';
        }
        if (auth()->user()->can(config('permission.permissions.update_quotes'))) {
            return '<a href="'.route('admin.quotes.quote.status', [$this, 'rejected']).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.quotes.reject').'" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>';
        }
    }
}