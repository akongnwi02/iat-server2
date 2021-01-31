<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 5/31/20
 * Time: 11:42 AM
 */

namespace App\Http\Controllers\Backend\Services\Price;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Services\Price\UpdatePriceRequest;
use App\Http\Requests\Backend\Services\Price\ShowPriceRequest;
use App\Http\Requests\Backend\Services\Price\StorePriceRequest;
use App\Models\SupplyPoint\Price;
use App\Repositories\Backend\SupplyPoint\PriceRepository;

class PriceController extends Controller
{
    /**
     * @param PriceRepository $priceRepository
     * @return mixed
     */
    public function index(PriceRepository $priceRepository)
    {
        return view('backend.services.price.index')
            ->withPrices($priceRepository->getPrices()
                ->paginate());
    }
    
    /**
     * @param Price $price
     * @param ShowPriceRequest $request
     * @return mixed
     */
    public function edit(Price $price, ShowPriceRequest $request)
    {
        return view('backend.services.price.edit')
            ->withPrice($price);
    }
    
    /**
     * @param UpdatePriceRequest $request
     * @param Price $price
     * @param PriceRepository $priceRepository
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdatePriceRequest $request, Price $price, PriceRepository $priceRepository)
    {
        $priceRepository->update($price, $request->input());
        
        return redirect()->route('admin.services.price.index')
                ->withFlashSuccess(__('alerts.backend.services.price.updated'));
    }
    
    public function create()
    {
        return view('backend.services.price.edit')
            ->withPrice(Price::first());
    }
    
    /**
     * @param StorePriceRequest $request
     * @param PriceRepository $priceRepository
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function store(StorePriceRequest $request, PriceRepository $priceRepository)
    {
        $priceRepository->store($request->input());
        
        return redirect()->route('admin.services.price.index')
            ->withFlashSuccess(__('alerts.backend.services.price.created'));
    }
}
