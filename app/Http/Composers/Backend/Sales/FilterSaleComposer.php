<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 8/5/21
 * Time: 9:54 PM
 */

namespace App\Http\Composers\Backend\Sales;


use App\Models\Company\Company;
use App\Models\Service\Service;
use App\Models\SupplyPoint\SupplyPoint;
use App\Repositories\Backend\Company\Company\CompanyRepository;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;
use Illuminate\View\View;

class FilterSaleComposer
{
    public $supplyPointRepository;
    public $companyRepository;
    
    public function __construct(SupplyPointRepository $supplyPointRepository, CompanyRepository $companyRepository)
    {
        $this->supplyPointRepository = $supplyPointRepository;
        $this->companyRepository = $companyRepository;
    }
    
    public function compose(View $view)
    {
        $services = auth()->user()->company->is_default ? Service::all() : auth()->user()->company->services();
    
        $view->with('companies', auth()->user()->company->is_default ? Company::all()->pluck('name', 'uuid')->toArray() : auth()->user()->company()->pluck('name', 'uuid')->toArray())
            ->with('services', $services->pluck('name', 'uuid')->toArray())
            ->with('points', auth()->user()->company->is_default ? SupplyPoint::all()->pluck('name', 'uuid')->toArray() : auth()->user()->company->points()->pluck('name', 'uuid')->toArray())
            ->with('statuses', config('business.transaction.status'));
    }
}