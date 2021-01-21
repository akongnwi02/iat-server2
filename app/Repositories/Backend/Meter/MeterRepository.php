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
    public function getAllMeters()
    {
        $services = QueryBuilder::for(Meter::class)
            ->allowedFilters([AllowedFilter::exact('is_active')])
            ->allowedSorts('meters.is_active', 'meters.created_at')
            ->defaultSort( '-meters.is_active', '-meters.created_at');
        return $services;
    }
    
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
}