<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/22/21
 * Time: 1:24 PM
 */

namespace App\Repositories\Backend\Meter;


use App\Models\Meter\Provider;
use Spatie\QueryBuilder\QueryBuilder;

class ProviderRepository
{
    public function getAllProviders()
    {
        return QueryBuilder::for(Provider::class)
            ->defaultSort( '-providers.name', '-providers.created_at');
    }
}