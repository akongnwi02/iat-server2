<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/22/21
 * Time: 2:29 PM
 */

namespace App\Http\Controllers\Backend\Point;


use App\Http\Controllers\Controller;
use App\Models\SupplyPoint\SupplyPoint;
use App\Repositories\Backend\Company\Company\CompanyRepository;
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
    
    /**
     * @param SupplyPoint $point
     * @param CompanyRepository $companyRepository
     * @return mixed
     */
    public function edit(SupplyPoint $point, CompanyRepository $companyRepository)
    {
        return view('backend.points.electricity.edit')
            ->withPoint($point)
            ->withCompanies($companyRepository->getCompaniesForCurrentUser()
                ->where('type', config('business.meter.type.electricity'))
                ->pluck('name', 'uuid')
                ->toArray());
    }
}