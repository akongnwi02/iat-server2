<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:27 PM
 */

namespace App\Http\Controllers\Backend\Meter;


use App\Exceptions\GeneralException;
use App\Exports\Meters\MetersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Meter\ActivateMeterRequest;
use App\Http\Requests\Backend\Meter\DeactivateMeterRequest;
use App\Http\Requests\Backend\Meter\UpdateMeterRequest;
use App\Http\Requests\Backend\Meter\StoreMeterRequest;
use App\Http\Requests\Backend\Meter\MaintainMeterRequest;
use App\Models\Meter\Meter;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Repositories\Backend\Meter\ProviderRepository;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;
use App\Services\Clients\ClientProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ElectricMeterController extends Controller
{
    use ClientProvider;
    
    /**
     * @param MeterRepository $meterRepository
     * @return mixed
     */
    public function index(MeterRepository $meterRepository)
    {
        return view('backend.meters.electricity.index')
            ->withMeters($meterRepository->getAllMeters()
//                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    
    }
    
    /**
     * @param MeterRepository $meterRepository
     * @return MetersExport
     */
    public function download(MeterRepository $meterRepository)
    {
        $meters = $meterRepository->getAllMeters()
//            ->where('type', config('business.meter.type.electricity'))
            ->get();
    
        return (new MetersExport($meters));
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
     * @param ProviderRepository $providerRepository
     * @return mixed
     * @throws GeneralException
     * @throws \App\Exceptions\Api\ServerErrorException
     */
    public function update(MeterRepository $meterRepository, UpdateMeterRequest $request, Meter $meter, ProviderRepository $providerRepository)
    {
        $data = request()->input();
    
        if($meter->provider_id != $data['provider_id']){
            $provider = $providerRepository->findByUuid($data['provider_id']);
            $data['identifier'] = $this->client($provider)->search($meter->meter_code);
        }
        
        $meterRepository->update($meter, $data);
    
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
//                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    }
    
    /**
     * @param Meter $meter
     * @param SupplyPointRepository $supplyPointRepository
     * @param ProviderRepository $providerRepository
     * @return mixed
     */
    public function edit(Meter $meter, SupplyPointRepository $supplyPointRepository, ProviderRepository $providerRepository)
    {
        return view('backend.meters.electricity.edit')
            ->withMeter($meter)
            ->withProviders($providerRepository->getAllProviders()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withSupplyPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
//                ->where('type', config('business.meter.type.electricity'))
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
//                ->where('type', config('business.meter.type.electricity'))
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
//                ->where('type', config('business.meter.type.electricity'))
                ->pluck('name', 'uuid')
                ->toArray())
            ->withProviders($providerRepository->getAllProviders()
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    /**
     * @param StoreMeterRequest $request
     * @param MeterRepository $meterRepository
     * @param ProviderRepository $providerRepository
     * @return mixed
     * @throws \App\Exceptions\Api\ServerErrorException
     * @throws GeneralException
     */
    public function store(StoreMeterRequest $request, MeterRepository $meterRepository, ProviderRepository $providerRepository)
    {
        $data = request()->input();
        
        $provider = $providerRepository->findByUuid($data['provider_id']);
        
        $data['identifier'] = $this->client($provider)->search($data['meter_code']);
//        $data['type'] = config('business.meter.type.electricity');
        
        $meterRepository->create($data);
    
        return redirect()->route('admin.meter.electricity.index')
            ->withFlashSuccess(__('alerts.backend.meters.electricity.created'));
    }
    
    /**
     * @param Request $request
     * @param MeterRepository $meterRepository
     * @param ProviderRepository $providerRepository
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function maintainForm(MaintainMeterRequest $request, MeterRepository $meterRepository, ProviderRepository $providerRepository)
    {
        
        $type = $request->has('type') ? $request->input('type') : 'clear_tamper';
        
        return view('backend.meters.electricity.maintain-show')
            ->withType($type);
    }
    
    /**
     * @param MaintainMeterRequest $request
     * @param MeterRepository $meterRepository
     * @return mixed
     * @throws \App\Exceptions\Api\ServerErrorException
     */
    public function maintain(MaintainMeterRequest $request, MeterRepository $meterRepository)
    {
        $meter = $meterRepository->findByMeterCode($request->input('meter_code'));
        
        $token = $this->client($meter->provider)->getMaintenanceCode($meter->meter_code, $request->input('type'));

        return view('backend.meters.electricity.maintain')
            ->withType($request->input('type'))
            ->withMeter($meter)
            ->withToken($token);
    }
}