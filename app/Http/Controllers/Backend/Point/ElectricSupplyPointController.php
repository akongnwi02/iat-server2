<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/22/21
 * Time: 2:29 PM
 */

namespace App\Http\Controllers\Backend\Point;


use App\Exports\SupplyPoint\PointExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SupplyPoint\UpdateSupplyPointRequest;
use App\Http\Requests\Backend\SupplyPoint\UpdateSupplyPointGpsCoordinatesRequest;
use App\Http\Requests\Backend\SupplyPoint\StoreSupplyPointRequest;
use App\Http\Requests\Backend\SupplyPoint\ShowSupplyPointRequest;
use App\Models\SupplyPoint\SupplyPoint;
use App\Repositories\Backend\Company\Company\CompanyRepository;
use App\Repositories\Backend\Services\Commission\CommissionRepository;
use App\Repositories\Backend\SupplyPoint\PriceRepository;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;

class ElectricSupplyPointController extends Controller
{
    /**
     * @param SupplyPointRepository $supplyPointRepository
     * @return mixed
     */
    public function index(SupplyPointRepository $supplyPointRepository)
    {
        return view('backend.points.electricity.index')
            ->withPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    }
    
    
    public function download(SupplyPointRepository $supplyPointRepository)
    {
        $points = $supplyPointRepository->getAllSupplyPointsForCurrentUser()
            ->where('type', config('business.meter.type.electricity'))
            ->get();
    
        return (new PointExport($points));
    }
    
    /**
     * @param SupplyPoint $point
     * @param CompanyRepository $companyRepository
     * @param CommissionRepository $commissionRepository
     * @param PriceRepository $priceRepository
     * @return mixed
     */
    public function edit(
        SupplyPoint $point,
        CompanyRepository $companyRepository,
        CommissionRepository $commissionRepository,
        PriceRepository $priceRepository
    )
    {
        return view('backend.points.electricity.edit')
            ->withPoint($point)
            ->withCompanies($companyRepository->getCompaniesForCurrentUser()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withCommissions($commissionRepository->getAllCommissions()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withPrices($priceRepository->getPrices()
                ->pluck('name', 'uuid')
                ->toArray());
            
    }
    
    /**
     * @param SupplyPointRepository $supplyPointRepository
     * @param SupplyPoint $point
     * @param UpdateSupplyPointRequest $request
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(SupplyPointRepository $supplyPointRepository, SupplyPoint $point, UpdateSupplyPointRequest $request)
    {
        $supplyPointRepository->update($point, $request->input());
    
        return redirect()->route('admin.point.electricity.index')
            ->withFlashSuccess(__('alerts.backend.points.electricity.updated'));
    }
    
    public function clone(
        SupplyPoint $point,
        CompanyRepository $companyRepository,
        CommissionRepository $commissionRepository,
        PriceRepository $priceRepository
    )
    {
        return view('backend.points.electricity.create')
            ->withPoint($point)
            ->withCompanies($companyRepository->getCompaniesForCurrentUser()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withCommissions($commissionRepository->getAllCommissions()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withPrices($priceRepository->getPrices()
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    public function create(
        CompanyRepository $companyRepository,
        CommissionRepository $commissionRepository,
        PriceRepository $priceRepository
    )
    {
        return view('backend.points.electricity.create')
            ->withCompanies($companyRepository->getCompaniesForCurrentUser()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withCommissions($commissionRepository->getAllCommissions()
                ->pluck('name', 'uuid')
                ->toArray())
            ->withPrices($priceRepository->getPrices()
                ->pluck('name', 'uuid')
                ->toArray());
    }
    
    public function store(SupplyPointRepository $supplyPointRepository, StoreSupplyPointRequest $request)
    {
        $data = $request->input();
        $data['type'] = config('business.meter.type.electricity');
        $supplyPointRepository->create($data);
    
        return redirect()->route('admin.point.electricity.index')
            ->withFlashSuccess(__('alerts.backend.points.electricity.created'));
    }
    
    /**
     * @param SupplyPointRepository $supplyPointRepository
     * @return mixed
     */
    public function map(SupplyPointRepository $supplyPointRepository)
    {
        return view('backend.points.electricity.map')
            ->withPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
                ->where('type', config('business.meter.type.electricity'))
                ->get());
    }
    
    public function singleMap(SupplyPointRepository $supplyPointRepository, ShowSupplyPointRequest $request, SupplyPoint $point)
    {
        return view('backend.points.electricity.map')
            ->withPoints($supplyPointRepository->getAllSupplyPointsForCurrentUser()
                ->where('type', config('business.meter.type.electricity'))
                ->where('uuid', $point->uuid)
                ->get());
    }
    
    public function editMap(SupplyPoint $point)
    {
        return view('backend.points.electricity.update-gps-coordinates')
            ->withPoint($point);
    }
    
    public function storeMap(SupplyPoint $point, UpdateSupplyPointGpsCoordinatesRequest $request, SupplyPointRepository $supplyPointRepository)
    {
        $supplyPointRepository->updateGps($point, $request->input());
    
        return redirect()->route('admin.point.electricity.index')
            ->withFlashSuccess(__('alerts.backend.points.electricity.gps_updated'));
    }
}
