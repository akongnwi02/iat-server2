<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/19/21
 * Time: 9:27 PM
 */

namespace App\Http\Controllers\Backend\Meter;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\Meter\MeterRepository;

class ElectricMeterController extends Controller
{
    
    public function index(MeterRepository $meterRepository)
    {
        return view('backend.meters.electricity.index')
            ->withMeters($meterRepository->getAllMeters()
                ->where('type', config('business.meter.type.electricity'))
                ->paginate());
    
    }
    
    public function create()
    {
    
    }
    public function store()
    {
    
    }
}