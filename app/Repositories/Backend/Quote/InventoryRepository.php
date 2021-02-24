<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/18/21
 * Time: 12:06 AM
 */

namespace App\Repositories\Backend\Quote;


use App\Exceptions\GeneralException;
use App\Models\Quote\Inventory;
use Spatie\QueryBuilder\QueryBuilder;

class InventoryRepository
{
    public function getInventories()
    {
        $inventory = QueryBuilder::for(Inventory::class)
            ->defaultSort('-created_at');
        return $inventory;
    }
    
    public function findByCode($code)
    {
        return Inventory::where('code', $code)->get();
    }
    
    /**
     * @param $inventory
     * @param $status
     * @return mixed
     * @throws GeneralException
     */
    public function mark($inventory, $status)
    {
        $inventory->is_active = $status;
        
        if ($inventory->save()) {
            
            switch ($status) {
                case 0:
//                    event(new InventoryDeactivated($category));
                    break;
                
                case 1:
//                    event(new InventoryReactivated($category));
                    break;
            }
            
            return $inventory;
        }
        
        throw new GeneralException(__('exceptions.backend.administration.inventory.mark_error'));
    }
    
    /**
     * @param $inventory
     * @param $data
     * @return mixed
     * @throws GeneralException
     */
    public function update($inventory, $data)
    {
        $inventory->fill($data);
        
        if ($inventory->save()) {
//            event(new CategoryUpdated($method));
            return $inventory;
        }
        
        throw new GeneralException(__('exceptions.backend.administration.inventory.update_error'));
    }
    
    /**
     * @param $data
     * @return Inventory
     * @throws GeneralException
     */
    public function create($data)
    {
        $inventory = (new Inventory())->fill($data);
        
        if ($inventory->save()) {
//            event(new PaymentMethodCreated($method));
            return $inventory;
        }
        
        throw new GeneralException(__('exceptions.backend.administration.inventory.create_error'));
    }
}