<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/22/21
 * Time: 2:29 PM
 */

namespace App\Http\Controllers\Backend\Point;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;

class SupplyPointController extends Controller
{
    /**
     * @param SupplyPointRepository $supplyPointRepository
     * @return mixed
     */
    public function index(SupplyPointRepository $supplyPointRepository)
    {
        return view('backend.points.electricity.index')
            ->withSupplyPoints($supplyPointRepository->getAllSupplyPoints()
                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    }
}