<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 4:06 PM
 */

namespace App\Http\Controllers\Backend\BillPayment;


use App\Http\Controllers\Controller;
use App\Models\Payment\Cycle;
use App\Repositories\Backend\Payment\CycleRepository;

class CycleController extends Controller
{
    
    /**
     * @param CycleRepository $cycleRepository
     * @return mixed
     */
    public function index(CycleRepository $cycleRepository)
    {
        return view('backend.payments.cycle.index')
            ->withCycles($cycleRepository->getCycles()->paginate());
    }
    
    /**
     * @param CycleStatusRequest $request
     * @param Cycle $cycle
     * @param $status
     * @param CycleRepository $cycleRepository
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function mark(CycleStatusRequest $request, Cycle $cycle, $status, CycleRepository $cycleRepository)
    {
        $cycleRepository->mark($cycle, $status);
    
        return redirect()->route('administration.cycle.index')
            ->withFlashSuccess(__('alerts.backend.administration.cycle.status_updated'));
    }
}