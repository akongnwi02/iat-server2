<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:27 PM
 */

namespace App\Http\Controllers\Backend\Meter;


use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Meter\ActivateMeterRequest;
use App\Http\Requests\Backend\Meter\DeactivateMeterRequest;
use App\Http\Requests\Backend\Meter\UpdateMeterRequest;
use App\Models\Meter\Meter;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;

class ElectricMeterController extends Controller
{
    /**
     * @param MeterRepository $meterRepository
     * @return mixed
     */
    public function index(MeterRepository $meterRepository)
    {
        return view('backend.meters.electricity.index')
            ->withMeters($meterRepository->getAllMeters()
                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    
    }
    
    /**
     * @param MeterRepository $meterRepository
     * @param ActivateMeterRequest $request
     * @param Meter $meter
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function activate(MeterRepository $meterRepository, ActivateMeterRequest $request, Meter $meter)
    {
        if ($meter->is_active) {
            throw new GeneralException(__('exceptions.backend.meters.electricity.already_active'));
        }
        $meterRepository->updateStatus($meter, 1);
    
        return redirect()->route('admin.meter.electricity.index')
            ->withFlashSuccess(__('alerts.backend.meters.electricity.activated'));
    }
    
    /**
     * @param ActivateMeterRequest $request
     * @param Meter $meter
     * @return mixed
     */
    public function deactivateForm(ActivateMeterRequest $request, Meter $meter)
    {
        return view('backend.meters.electricity.deactivate')
            ->withMeter($meter);
    }
    
    /**
     * @param MeterRepository $meterRepository
     * @param DeactivateMeterRequest $request
     * @param Meter $meter
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function deactivate(MeterRepository $meterRepository, DeactivateMeterRequest $request, Meter $meter)
    {
        if (!$meter->is_active) {
            throw new GeneralException(__('exceptions.backend.meters.electricity.already_inactive'));
        }
        $meterRepository->updateStatus($meter, 0, request('comment'));
    
        return redirect()->route('admin.meter.electricity.index')
            ->withFlashSuccess(__('alerts.backend.meters.electricity.deactivated'));
    }
    
    public function update(MeterRepository $meterRepository, UpdateMeterRequest $request, Meter $meter)
    {
        $meterRepository->update($meter, $request->input());
    
        return redirect()->route('admin.meter.electricity.index')
                ->withFlashSuccess(__('alerts.backend.meters.electricity.updated'));
    }
    
    public function unassigned(MeterRepository $meterRepository)
    {
        return view('backend.meters.electricity.index')
            ->withMeters($meterRepository->getAllMeters()
                ->whereNull('supply_point_id')
                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    }
    
    public function edit(ActivateMeterRequest $request, MeterRepository $meterRepository, Meter $meter, SupplyPointRepository $supplyPointRepository)
    {
        return view('backend.meters.electricity.edit')
            ->withMeter($meter)
            ->withSupplyPoints($supplyPointRepository->getAllSupplyPoints()
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    public function create(SupplyPointRepository $supplyPointRepository)
    {
        return view('backend.services.service.create')
            ->withCommissions($commissionRepository->getAllCommissions()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withCategories($categoryRepository->get()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withDistributions($commissionDistributionRepository->getAllCommissionDistributions()
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    public function store()
    {
    
    }
}