<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/24/20
 * Time: 6:42 PM
 */

namespace App\Http\Controllers\Backend\Services\Commission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Services\Commission\StoreCommissionRequest;
use App\Http\Requests\Backend\Services\Commission\UpdateCommissionRequest;
use App\Models\Business\Commission;
use App\Repositories\Backend\Services\Commission\CommissionRepository;
use App\Repositories\Backend\System\CurrencyRepository;

class CommissionController extends Controller
{
    
    /**
     * @param CommissionRepository $commissionRepository
     * @return mixed
     */
    public function index(CommissionRepository $commissionRepository)
    {
        return view('backend.services.commission.index')
            ->withCommissions($commissionRepository->getAllCommissions()
                ->paginate());
    }
    
    public function edit(Commission $commission, CurrencyRepository $currencyRepository)
    {
        return view('backend.services.commission.edit')
            ->withCommission($commission->load(['pricings' => function ($query) {
                $query->orderBy('from', 'asc')
                    ->orderBy('to', 'asc');
            }]))
            ->withCurrencies($currencyRepository->get()
                ->pluck('code', 'uuid')
                ->toArray());
    }
    
    /**
     * @param Commission $commission
     * @param UpdateCommissionRequest $request
     * @param CommissionRepository $commissionRepository
     * @return mixed
     * @throws \Throwable
     */
    public function update(Commission $commission, UpdateCommissionRequest $request, CommissionRepository $commissionRepository)
    {
        $commission = $commissionRepository->update($commission, $request->input());
    
        return redirect()->route('admin.services.commission.edit', $commission)
            ->withFlashSuccess(__('alerts.backend.services.commission.created'));
    }
    
    /**
     * @param CurrencyRepository $currencyRepository
     * @return mixed
     */
    public function create(CurrencyRepository $currencyRepository)
    {
        return view('backend.services.commission.create')
            ->withCurrencies($currencyRepository->get()
                ->pluck('code', 'uuid')
                ->toArray());
    }
    
    /**
     * @param StoreCommissionRequest $request
     * @param CommissionRepository $commissionRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(StoreCommissionRequest $request, CommissionRepository $commissionRepository)
    {
        $commission = $commissionRepository->create($request->input());
    
        return redirect()->route('admin.services.commission.edit', $commission);
    }
}
