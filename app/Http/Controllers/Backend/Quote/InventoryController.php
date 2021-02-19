<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/17/21
 * Time: 11:56 PM
 */

namespace App\Http\Controllers\Backend\Quote;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Quote\StoreInventoryRequest;
use App\Http\Requests\Backend\Quote\UpdateInventoryRequest;
use App\Models\Quote\Inventory;
use App\Repositories\Backend\Quote\InventoryRepository;

class InventoryController extends Controller
{
    /**
     * @param InventoryRepository $inventoryRepository
     * @return mixed
     */
    public function index(InventoryRepository $inventoryRepository)
    {
        return view('backend.quotes.inventory.index')
            ->withInventories($inventoryRepository->getInventories()->paginate());
    }
    
    public function create()
    {
        return view('backend.quotes.inventory.create');
    }
    
    /**
     * @param StoreInventoryRequest $request
     * @param InventoryRepository $inventoryRepository
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function store(StoreInventoryRequest $request, InventoryRepository $inventoryRepository)
    {
        $inventoryRepository->create($request->input());
        
        return redirect()->route('admin.quotes.inventory.index')
            ->withFlashSuccess(__('alerts.backend.quote.inventory.created'));
    }
    
    /**
     * @param UpdateInventoryRequest $request
     * @param Inventory $inventory
     * @param InventoryRepository $inventoryRepository
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateInventoryRequest $request, Inventory $inventory, InventoryRepository $inventoryRepository)
    {
        $inventoryRepository->update($inventory, $request->input());
        
        return redirect()->route('admin.quotes.inventory.index')
            ->withFlashSuccess(__('alerts.backend.administration.currency.updated'));
    }

    /**
     * @param Inventory $inventory
     * @return mixed
     */
    public function edit(Inventory $inventory)
    {
        return view('backend.quotes.inventory.edit')
            ->withInventory($inventory);
    }
    
}