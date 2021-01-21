<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 1/21/21
 * Time: 10:53 PM
 */

namespace App\Http\Composers\Backend\Meter;


use App\Models\Meter\Provider;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;
use Illuminate\View\View;

class FilterMeterComposer
{
    public $supplyPointRepository;
    
    public function __construct(SupplyPointRepository $supplyPointRepository)
    {
        $this->supplyPointRepository = $supplyPointRepository;
    }
    
    public function compose(View $view)
    {
        $view->with('providers', Provider::all()->pluck('name', 'uuid')->toArray());
    }
}