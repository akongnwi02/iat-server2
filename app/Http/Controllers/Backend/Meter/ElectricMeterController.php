<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:27 PM
 */

namespace App\Http\Controllers\Backend\Meter;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Meter\ActivateMeterRequest;
use App\Http\Requests\Backend\Meter\DeactivateMeterRequest;
use App\Models\Meter\Meter;
use App\Repositories\Backend\Meter\MeterRepository;

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
        $meterRepository->updateStatus($meter, 0, request('comment'));
    
        return redirect()->route('admin.meter.electricity.index')
            ->withFlashSuccess(__('alerts.backend.meters.electricity.deactivated'));
    }
    
    public function create()
    {
    
    }
    public function store()
    {
    
    }
}