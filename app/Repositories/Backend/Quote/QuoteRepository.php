<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/20/21
 * Time: 12:17 AM
 */

namespace App\Repositories\Backend\Quote;


use App\Models\Quote\Quote;
use Spatie\QueryBuilder\QueryBuilder;

class QuoteRepository
{
    public function getQuotes()
    {
        $inventory = QueryBuilder::for(Quote::class)
            ->defaultSort('-created_at', 'title');
        return $inventory;
    }
}