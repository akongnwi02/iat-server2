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
use Spatie\QueryBuilder\QueryBuilder;
use Webpatser\Uuid\Uuid;

class QuoteRepository
{
    public function getQuotes()
    {
        $inventory = QueryBuilder::for(Quote::class)
            ->defaultSort('-created_at', 'title');
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
                'title'        => $data['title'],
                'description' => $data['description'],
                'status'      => 'created',
                'type'        => $data['type'],
                'code' => rand(100000000, 999999999)
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
        
            throw new GeneralException(__('exceptions.backend.quote.create_error'));
        });
    }
}