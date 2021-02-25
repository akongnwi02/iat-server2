<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/23/21
 * Time: 10:49 PM
 */

namespace App\Models\Traits\Relationships;


use App\Models\Quote\Inventory;
use App\Models\Quote\QuoteInventory;

trait QuoteRelationship
{
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'quote_inventories', 'quote_id', 'inventory_id', 'uuid')
            ->withTimestamps()
            ->using(QuoteInventory::class)
            ->withPivot(
                'unit_cost',
                'quantity',
                'sub_total'
            );
    }
}