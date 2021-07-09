<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/21/21
 * Time: 9:47 PM
 */

namespace App\Repositories\Backend\SupplyPoint;


use App\Exceptions\GeneralException;
use App\Models\Account\Account;
use App\Models\Account\AccountType;
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
    
    
        // create account for the company
        $account = new Account();
        $account->code = Account::generateCode();
        $account->type_id = AccountType::where('name', config('business.account.type.point'))->first()->uuid;
        
        if ($point->is_auto_price) {
            $point->adjusted_price = $point->provider_price + $point->auto_price_margin;
        }
        
        if ($point->save()) {
            $account->owner_id = $point->uuid;
            
            if ($account->save()) {
//                event(new SupplyPointCreated($point));
                return $point;
            }
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
        $point->address = $data['address'];
    
        if ($point->update()) {

//            event(new ServiceUpdated($service));
        
            return $point;
        }
    
        throw new GeneralException(__('exceptions.backend.points.electricity.update_error'));
    }
    
    public function autoUpdateTariff(SupplyPoint $point, $cycleYear, $cycleMonth)
    {
        \Log::debug('Check to see if tariff should be updated automatically', $point->getAttributes());
    
        $amount = $point->getSumPaymentsForCycle($cycleYear, $cycleMonth);
    
        $consumption = $point->getENEOConsumptionForCycle($cycleYear, $cycleMonth);
    
        if ($point->is_auto_price && $consumption) {
    
            \Log::debug('Auto update of tariff in progress');
    
            $point->provider_price = $amount / $consumption;
            
            $point->adjusted_price = $point->auto_price_margin + $point->provider_price;
    
            if ($point->update()) {
                \Log::info('Auto price adjusted automatically');
                return $point;
            }
    
            \Log::error('There was an error auto updating the tariff for this supply point', $point->getAttributes());
        }
    }
    
    public function findByUuid($uuid)
    {
        return SupplyPoint::where('uuid', $uuid)->first();
    }
}