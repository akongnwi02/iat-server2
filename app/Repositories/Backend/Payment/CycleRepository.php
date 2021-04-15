<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/8/21
 * Time: 4:09 PM
 */

namespace App\Repositories\Backend\Payment;


use App\Exceptions\GeneralException;
use App\Models\Payment\Cycle;
use Spatie\QueryBuilder\QueryBuilder;

class CycleRepository
{
    /**
     * @return QueryBuilder
     */
    public function getCycles()
    {
        $cycles = QueryBuilder::for(Cycle::class)
            ->defaultSort('-created_at');
        return $cycles;
    }
    
    /**
     * @param Cycle $cycle
     * @param $status
     * @return Cycle
     * @throws GeneralException
     */
    public function mark(Cycle $cycle, $status)
    {
        $cycle->is_complete = $status;
    
        if ($cycle->save()) {
        
            switch ($status) {
                case 0:
//                    event(new CycleReopened($account));
                    break;
            
                case 1:
//                    event(new CycleCompleted($account));
                    break;
            }
        
            return $cycle;
        }
    
        throw new GeneralException(__('exceptions.backend.administration.cycle.mark_error'));
    }
    
    /**
     * @return Cycle
     * @throws GeneralException
     */
    public function create()
    {
        $cycleMonth = now()->month;
        $cycleYear = now()->year;
    
        $cycle = Cycle::where('cycle_month', $cycleMonth)
            ->where('cycle_year', $cycleYear)->first();
        if ($cycle) {
            throw new GeneralException(__('exceptions.backend.administration.cycle.create_duplicate_error'));
        }
    
        return Cycle::create([
            'cycle_month' => $cycleMonth,
            'cycle_year' => $cycleYear,
        ]);
    }
    
    /**
     * @param $cycleYear
     * @param $cycleMonth
     * @return Cycle
     */
    public function findByYearAndMonth($cycleYear, $cycleMonth)
    {
        $cycle = Cycle::where('cycle_month', $cycleMonth)
            ->where('cycle_year', $cycleYear)->first();
    
        return $cycle;
    }
}