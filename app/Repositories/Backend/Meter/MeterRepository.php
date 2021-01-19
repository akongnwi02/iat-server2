<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:37 PM
 */

namespace App\Repositories\Backend\Meter;


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
}