<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:37 PM
 */

namespace App\Repositories\Backend\Meter;


use App\Exceptions\GeneralException;
use App\Models\Meter\Meter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MeterRepository
{
    /**
     * @return QueryBuilder
     */
    public function getAllMeters()
    {
        $meters = QueryBuilder::for(Meter::class)
            ->allowedFilters([
                AllowedFilter::partial('meter_code'),
                AllowedFilter::partial('supply_point.company.name'),
                AllowedFilter::partial('supply_point.name'),
                AllowedFilter::exact('provider_id'),
                AllowedFilter::exact('is_active'),
                AllowedFilter::scope('vend_start_date'),
                AllowedFilter::scope('vend_end_date'),
            ])
            ->allowedSorts('meters.is_active', 'meters.created_at')
            ->defaultSort( '-meters.is_active', '-meters.created_at');
        
        if (! auth()->user()->company->is_default) {
            $meters->whereHas('supply_point', function($query){
                $query->where('company_id', auth()->user()->company->uuid);
            });
        }
        
        return $meters;
    }
    
    /**
     * @param $meter
     * @param $status
     * @param null $comment
     * @return mixed
     * @throws GeneralException
     */
    public function updateStatus($meter, $status, $comment = null)
    {
        $meter->is_active = $status;
        if ($comment) {
            $meter->blocked_reason = $comment;
        }
        if ($status == 0) {
            $meter->blocker_id = auth()->user()->uuid;
        }
    
        if ($meter->save()) {
        
//            switch ($status) {
//                case 0:
//                    event(new ServiceDeactivated($service));
//                    break;
//
//                case 1:
//                    event(new ServiceReactivated($service));
//                    break;
//            }
        
            return $meter;
        }
    
        throw new GeneralException(__('exceptions.backend.meters.electricity.activate'));
    }
    
    /**
     * @param $meter
     * @param $data
     * @return mixed
     * @throws GeneralException
     */
    public function update($meter, $data)
    {
        $meter->supply_point_id = @$data['supply_point_id'];
        $meter->phone = @$data['phone'];
        $meter->email = @$data['email'];
    
        if ($meter->update()) {
        
//            event(new MeterUpdated($meter));
        
            return $meter;
        }
    
        throw new GeneralException(__('exceptions.backend.meters.electricity.update_error'));
    }
    
    /**
     * @param $data
     * @return Meter
     * @throws GeneralException
     */
    public function create($data)
    {
        $meter = (new Meter())->fill($data);
    
        if ($meter->save()) {

//            event(new ServiceUpdated($service));
        
            return $meter;
        }
    
        throw new GeneralException(__('exceptions.backend.meters.electricity.create_error'));
    }
}