<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/31/20
 * Time: 12:02 AM
 */

namespace App\Http\Controllers\Backend\Sales;

use App\Exceptions\GeneralException;
use App\Exports\Sales\SalesExport;
use App\Http\Requests\Backend\Sales\SalesQuoteRequest;
use App\Models\Company\Company;
use App\Models\Service\Service;
use App\Repositories\Api\Business\TransactionRepository;
use App\Repositories\Backend\Company\Company\CompanyRepository;
use App\Repositories\Backend\Services\Service\ServiceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalesController
{
    public function index(TransactionRepository $transactionRepository, ServiceRepository $serviceRepository, CompanyRepository $companyRepository)
    {
        $sales = $transactionRepository->getAllSales()->with(['service', 'company', 'user']);
        $services = auth()->user()->company->is_default ? Service::all() : auth()->user()->company->services();

        return view('backend.sales.index')
            ->withSales($sales->paginate())
            ->withStatuses(config('business.transaction.status'))
            ->withServices($services->pluck('name', 'uuid')->toArray())
            ->withCompanies(auth()->user()->company->is_default ? Company::all()->pluck('name', 'uuid')->toArray() : auth()->user()->company()->pluck('name', 'uuid')->toArray());
    }
    
    public function download(TransactionRepository $transactionRepository)
    {
        $sales = $transactionRepository->getAllSales()->get();
        
        return (new SalesExport($sales));
    }
    
    public function create()
    {
        return view('backend.sales.create')
            ->withServices(auth()->user()->company->services()->pluck('name', 'code')->toArray());
    }
    
    /**
     * @param SalesQuoteRequest $request
     * @param TransactionRepository $transactionRepository
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function quote(SalesQuoteRequest $request, TransactionRepository $transactionRepository)
    {
        \Log::info('New quote request received. Processing the quote request ... ');
    
        $transaction = $transactionRepository->create($request->input());
    
        $ttl = Carbon::now()->addMinutes(config('app.micro_services.cache_expiration'));
    
        $cached = \Cache::store(config('app.micro_services.cache_store'))->add($transaction->code, $transaction, $ttl);
    
        if ($cached) {
        
            \Log::info('Quote saved to cache successfully. Sending response to client');
        
            return view('backend.sales.quote-show')
                ->withTransaction($transaction);
        }
    
        throw new GeneralException(__('exceptions.backend.sales.quote_error'));
    }
    
    /**
     * @param Request $request
     * @param TransactionRepository $transactionRepository
     * @param $code
     * @return mixed
     * @throws GeneralException
     * @throws \App\Exceptions\Api\BadRequestException
     * @throws \Throwable
     */
    public function confirm(Request $request, TransactionRepository $transactionRepository, $code)
    {
        $transaction = \Cache::store(config('app.micro_services.cache_store'))->pull($code);
    
        if ($transaction) {
            \Log::info('Purchase confirmation request received. Beginning processing');
        
            $processed = $transactionRepository->processTransaction($transaction);
            
            if ($processed) {
                return redirect()->route('admin.sales.index')
                    ->withFlashSuccess(__('alerts.backend.sales.success'));
            }
        }
    
        throw new GeneralException(__('exceptions.backend.sales.quote_not_found'));
    }
}
