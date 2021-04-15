<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/21/21
 * Time: 9:47 PM
 */

namespace App\Repositories\Backend\SupplyPoint;


use App\Exceptions\GeneralException;
use App\Models\SupplyPoint\SupplyPoint;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SupplyPointRepository
{
    /**
     * @return QueryBuilder
     */
    public function getAllSupplyPointsForCurrentUser()
    {
        $supplyPoints = QueryBuilder::for(SupplyPoint::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::partial('city'),
                AllowedFilter::partial('address'),
                AllowedFilter::partial('external_identifier'),
                AllowedFilter::partial('company.name'),
                AllowedFilter::exact('is_auto_price'),
                AllowedFilter::exact('is_internal'),
            ])
            ->allowedSorts('supply_points.created_at')
            ->defaultSort( '-supply_points.created_at');
        
        if (! auth()->user()->company->is_default) {
            $supplyPoints->where('company_id', auth()->user()->company->uuid);
        }
        
        return $supplyPoints;
    }
    
    /**
     * @param $point
     * @param $data
     * @return mixed
     * @throws GeneralException
     */
    public function update($point, $data)
    {
        $point->fill($data);
        $point->is_auto_price = request()->has('is_auto_price') ? 1 : 0;
        $point->is_internal = request()->has('is_internal') ? 1 : 0;
    
        if ($point->is_auto_price) {
            $point->adjusted_price = $point->provider_price + $point->auto_price_margin;
        }
        
        if ($point->update()) {
        
//            event(new ServiceUpdated($service));
        
            return $point;
        }
    
        throw new GeneralException(__('exceptions.backend.points.electricity.update_error'));
    
    }
    
    /**
     * @param $data
     * @return SupplyPoint
     * @throws GeneralException
     */
    public function create($data)
    {
        $point = (new SupplyPoint())->fill($data);
        $point->is_auto_price = request()->has('is_auto_price') ? 1 : 0;
        $point->is_internal = request()->has('is_internal') ? 1 : 0;
    
        if ($point->is_auto_price) {
            $point->adjusted_price = $point->provider_price + $point->auto_price_margin;
        }
        
        if ($point->save()) {

//            event(new ServiceUpdated($service));
        
            return $point;
        }
    
        throw new GeneralException(__('exceptions.backend.points.electricity.create_error'));
    }
    
    /**
     * @param $point
     * @param $data
     * @return mixed
     * @throws GeneralException
     */
    public function updateGps($point, $data)
    {
        $point->gps_lat = $data['gps_lat'];
        $point->gps_long = $data['gps_long'];
    
        if ($point->update()) {

//            event(new ServiceUpdated($service));
        
            return $point;
        }
    
        throw new GeneralException(__('exceptions.backend.points.electricity.update_error'));
    }
}