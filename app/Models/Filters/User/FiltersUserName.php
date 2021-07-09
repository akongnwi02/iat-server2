<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 7/9/21
 * Time: 12:10 AM
 */

namespace App\Models\Filters\User;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FiltersUserName implements Filter
{
    
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where('first_name', 'ilike', '%' . $value . '%')
            ->orWhere('last_name', 'ilike', '%' . $value . '%');
    }
}