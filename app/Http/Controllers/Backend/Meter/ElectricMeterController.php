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
use App\Http\Requests\Backend\Meter\StoreMeterRequest;
use App\Models\Meter\Meter;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Repositories\Backend\Meter\ProviderRepository;
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
     * @throws GeneralException
     */
    public function deactivateForm(ActivateMeterRequest $request, Meter $meter)
    {
        if (!$meter->is_active) {
            throw new GeneralException(__('exceptions.backend.meters.electricity.already_inactive'));
        }
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
        $meterRepository->updateStatus($meter, 0, request('comment'));
    
        return redirect()->route('admin.meter.electricity.index')
            ->withFlashSuccess(__('alerts.backend.meters.electricity.deactivated'));
    }
    
    /**
     * @param MeterRepository $meterRepository
     * @param UpdateMeterRequest $request
     * @param Meter $meter
     * @return mixed
     * @throws GeneralException
     */
    public function update(MeterRepository $meterRepository, UpdateMeterRequest $request, Meter $meter)
    {
        $meterRepository->update($meter, $request->input());
    
        return redirect()->route('admin.meter.electricity.index')
                ->withFlashSuccess(__('alerts.backend.meters.electricity.updated'));
    }
    
    /**
     * @param MeterRepository $meterRepository
     * @return mixed
     */
    public function unassigned(MeterRepository $meterRepository)
    {
        return view('backend.meters.electricity.index')
            ->withMeters($meterRepository->getAllMeters()
                ->whereNull('supply_point_id')
                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    }
    
    /**
     * @param Meter $meter
     * @param SupplyPointRepository $supplyPointRepository
     * @return mixed
     */
    public function edit(Meter $meter, SupplyPointRepository $supplyPointRepository)
    {
        return view('backend.meters.electricity.edit')
            ->withMeter($meter)
            ->withSupplyPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
                ->where('type', config('business.meter.type.electricity'))
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    /**
     * @param SupplyPointRepository $supplyPointRepository
     * @param ProviderRepository $providerRepository
     * @return mixed
     */
    public function create(SupplyPointRepository $supplyPointRepository, ProviderRepository $providerRepository)
    {
        return view('backend.meters.electricity.create')
            ->withSupplyPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
                ->where('type', config('business.meter.type.electricity'))
                ->pluck('name', 'uuid')
                ->toArray())
            ->withProviders($providerRepository->getAllProviders()
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    public function clone(Meter $meter, SupplyPointRepository $supplyPointRepository, ProviderRepository $providerRepository)
    {
        return view('backend.meters.electricity.create')
            ->withMeter($meter)
            ->withSupplyPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
                ->where('type', config('business.meter.type.electricity'))
                ->pluck('name', 'uuid')
                ->toArray())
            ->withProviders($providerRepository->getAllProviders()
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    public function store(StoreMeterRequest $request, MeterRepository $meterRepository)
    {
    
    }
}