<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/20/21
 * Time: 12:17 AM
 */

namespace App\Repositories\Backend\Quote;


use App\Exceptions\GeneralException;
use App\Models\Quote\Quote;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Webpatser\Uuid\Uuid;

class QuoteRepository
{
    public function getQuotes()
    {
        $inventory = QueryBuilder::for(Quote::class)
            ->defaultSort('-created_at', 'title')
            ->allowedFilters([
                AllowedFilter::partial('code'),
                AllowedFilter::partial('customer_name'),
                AllowedFilter::partial('user.username'),
                AllowedFilter::exact('status'),
                AllowedFilter::scope('start_date'),
                AllowedFilter::scope('end_date'),
            ]);
        return $inventory;
    }
    
    /**
     * @param $data
     * @return mixed
     * @throws \Throwable
     */
    public function create($data)
    {
        return \DB::transaction(function () use ($data) {
            $quote = (new Quote())->fill([
                'customer_name'    => $data['customer_name'],
                'customer_phone'   => $data['customer_phone'],
                'customer_address' => $data['customer_address'],
                'title'            => $data['title'],
                'description'      => $data['description'],
                'status'           => 'created',
                'type'             => $data['type'],
                'code'             => rand(10000000, 99999999)
            ]);
            
            $amount = 0;
            $inventories = [];
            
            foreach ($data['inventories'] as $inventory) {
                $inventory['sub_total'] = $inventory['unit_cost'] * $inventory['quantity'];
                $inventory['uuid'] = Uuid::generate(4)->string;
                $amount += $inventory['sub_total'];
                $inventories[] = $inventory;
            }
    
            $quote->amount = $amount;
    
            if ($quote->save()) {
                
                $quote->inventories()->detach();
                
                foreach ($inventories as $inventory) {
                    $quote->inventories()->attach($inventory['inventory_id'], $inventory);
                }
                return $quote;
            }
    
            throw new GeneralException(__('exceptions.backend.quote.create_error'));
        });
    }
    
    /**
     * @param $quote
     * @param $data
     * @return mixed
     * @throws \Throwable
     */
    public function update($quote, $data)
    {
        return \DB::transaction(function () use ($quote, $data) {
            $quote->fill([
                'customer_name'    => $data['customer_name'],
                'customer_phone'   => $data['customer_phone'],
                'customer_address' => $data['customer_address'],
                'title'        => $data['title'],
                'description' => $data['description'],
                'status'      => 'created',
                'type'        => $data['type'],
            ]);
        
            $amount = 0;
            $inventories = [];
        
            foreach ($data['inventories'] as $inventory) {
                $inventory['sub_total'] = $inventory['unit_cost'] * $inventory['quantity'];
                $inventory['uuid'] = Uuid::generate(4)->string;
                $amount += $inventory['sub_total'];
                $inventories[] = $inventory;
            }
        
            $quote->amount = $amount;
        
            if ($quote->save()) {
                
                $quote->inventories()->detach();
                
                foreach ($inventories as $inventory) {
                    $quote->inventories()->attach($inventory['inventory_id'], $inventory);
                }
                return $quote;
            }
        
            throw new GeneralException(__('exceptions.backend.quote.update_error'));
        });
    }
    
    /**
     * @param $quote
     * @param $status
     * @return mixed
     * @throws GeneralException
     */
    public function updateStatus($quote, $status)
    {
        $quote->status = $status;
        if ($quote->save()) {
            return $quote;
        }
        throw new GeneralException(__('exceptions.backend.quote.update_error'));
    }
}