<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/27/21
 * Time: 10:21 PM
 */

namespace App\Repositories\Backend\SupplyPoint;


use App\Exceptions\GeneralException;
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
    
    /**
     * @param Price $price
     * @param $data
     * @return Price
     * @throws GeneralException
     */
    public function update(Price $price, $data)
    {
        $price->fill($data);
    
        if ($price->update()) {
            return $price;
        }
        
        throw new GeneralException(__('exceptions.backend.services.price.update_error'));
    }
    
    /**
     * @param $data
     * @return Price
     * @throws GeneralException
     */
    public function store($data)
    {
        $price = (new Price)->fill($data);
    
        if ($price->save()) {
            return $price;
        }
    
        throw new GeneralException(__('exceptions.backend.services.price.create_error'));
    }
}
