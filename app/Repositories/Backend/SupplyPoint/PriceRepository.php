<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/27/21
 * Time: 10:21 PM
 */

namespace App\Repositories\Backend\SupplyPoint;


use App\Models\SupplyPoint\Price;
use Spatie\QueryBuilder\QueryBuilder;

class PriceRepository
{
    /**
     * @return QueryBuilder
     */
    public function getPrices()
    {
        return QueryBuilder::for(Price::class)
            ->allowedSorts( 'name', 'created_at');
    }
}