<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/15/20
 * Time: 3:37 PM
 */

namespace App\Repositories\Api\Business;

use App\Exceptions\Api\BadRequestException;
use App\Exceptions\Api\NotFoundException;
use App\Exceptions\GeneralException;
use App\Models\Transaction\Transaction;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Repositories\Backend\Movement\MovementRepository;
use App\Repositories\Backend\Services\Service\PaymentMethodRepository;
use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;
use App\Repositories\Backend\System\CurrencyRepository;
use App\Services\Business\Models\ModelInterface;
use App\Repositories\Backend\Services\Service\ServiceRepository;
use App\Repositories\Backend\Services\Commission\CommissionRepository;
use App\Services\Clients\ClientProvider;
use App\Services\Constants\BusinessErrorCodes;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TransactionRepository
{
    use ClientProvider;
    
    public $serviceRepository;
    public $paymentMethodRepository;
    public $commissionRepository;
    public $movementRepository;
    public $currencyRepository;
    public $supplyPointRepository;
    public $meterRepository;
    
    public function __construct
    (
        ServiceRepository $serviceRepository,
        CommissionRepository $commissionRepository,
        MovementRepository $movementRepository,
        PaymentMethodRepository $paymentMethodRepository,
        CurrencyRepository $currencyRepository,
        SupplyPointRepository $supplyPointRepository,
        MeterRepository $meterRepository
    )
    {
        $this->serviceRepository       = $serviceRepository;
        $this->commissionRepository    = $commissionRepository;
        $this->movementRepository      = $movementRepository;
        $this->paymentMethodRepository = $paymentMethodRepository;
        $this->currencyRepository      = $currencyRepository;
        $this->supplyPointRepository   = $supplyPointRepository;
        $this->meterRepository         = $meterRepository;
    }
    
    /**
     * @param $uuid
     * @return mixed
     * @throws NotFoundException
     */
    public function findByUuid($uuid)
    {
        $transaction = Transaction::where('uuid', $uuid)->first();
        
        if ($transaction) {
            return $transaction;
        }
        
        throw new NotFoundException(BusinessErrorCodes::TRANSACTION_NOT_FOUND, 'Transaction does not exist in database');
    }
    
    /**
     * @param ModelInterface $model
     * @return mixed
     * @throws \Throwable
     */
    public function create($data)
    {
         /*
             * get the service
             */
            $meter = $this->meterRepository->findByMeterCode($data['service_number']);
    
            // make sure meter is active and assigned
            if (! $meter->is_active) {
                throw new GeneralException(__('exceptions.backend.sales.meter_inactive'));
            }
    
            if (! $meter->supply_point_id) {
                throw  new GeneralException(__('exceptions.backend.sales.meter_unassigned'));
            }
    
            $service  = $this->serviceRepository->findByCode($data['service_code']);
    
            if ($data['amount'] < $service->min_amount) {
                throw new GeneralException(__('exceptions.backend.sales.min_amount'));
            }
            
            if ($data['amount'] > $service->max_amount) {
                throw new GeneralException(__('exceptions.backend.sales.max_amount'));
            }
            
            if ($data['amount'] % $service->step_amount != 0) {
                throw new GeneralException(__('exceptions.backend.sales.step_amount'));
            }
            
            $category = $service->category;
    
            if ($meter->type != $category->code) {
                throw  new GeneralException(__('exceptions.backend.sales.category_invalid'));
            }
            
            $supplyPoint = $meter->supplyPoint;
            
            $price = $supplyPoint->is_auto_price ? $supplyPoint->adjusted_price : $supplyPoint->price->amount;
    
            $units = round(($data['amount'] / $price),2);
            
            /*
             * get the commissions
             */
            $customerServiceCommission = $supplyPoint->serviceCharge ?: $service->customer_commission;
            
            /*
             * calculate the fees
             */
            $customerServiceFee = $this->commissionRepository->calculateFee($customerServiceCommission, $data['amount']);
            
            \Log::debug('The following service charge will be applied for this transaction', [
                'uuid' => $customerServiceCommission->uuid,
                'name' => $customerServiceCommission->name,
                'description' => $customerServiceCommission->description,
            ]);
            
            // Transaction creation
            $transaction = new Transaction();
            
            $transaction->code             = Transaction::generateCode();
            $transaction->amount           = $data['amount'];
            $transaction->user_id          = auth()->user()->uuid;
            $transaction->company_id       = auth()->user()->company_id;
            $transaction->service_code     = $data['service_code'];
            $transaction->currency_code    = $data['currency_code'];
            $transaction->paymentaccount   = auth()->user()->account->code;
            $transaction->destination      = $data['service_number'];
            $transaction->status           = config('business.transaction.status.created');
            $transaction->meter_id         = $meter->uuid;
            $transaction->type = $meter->type;
            $transaction->customer_servicecommission_id = @$customerServiceCommission->uuid;
            $transaction->price_id = @$supplyPoint->price->uuid;
            $transaction->price = $price;
            $transaction->units = $units;
            $transaction->service_id    = $service->uuid;
            $transaction->category_id   = $category->uuid;
            $transaction->category_code = $category->code;

            $transaction->system_commission = $customerServiceFee;
            
            $transaction->customer_phone = @$data['phone_number'];
            
            return $transaction;
    }
    
    /**
     * Processes payment for the default payment method.
     * If user's account balance is insufficient,
     * use the company's balance if direct polling is enabled
     *
     * @param $transaction
     * @throws BadRequestException
     * @throws \Throwable
     * @return boolean
     */
    public function processTransaction($transaction)
    {
        // verify if user has sufficient balance
        $companyAccount = $transaction->company->account;
        
         if($companyAccount->is_active) {
             $this->movementRepository->registerSale($transaction);
            return true;
        } else {
            throw new GeneralException(__('exceptions.backend.sales.account_inactive'));
        }
    }
    
    public function getAgentTransactions()
    {
        $transactions = QueryBuilder::for(Transaction::class)
            ->where('user_id', auth()->user()->uuid)
            ->whereNotIn('status', [config('business.transaction.status.created')])
            ->allowedSorts('transactions.created_at', 'transactions.updated_at')
            ->defaultSort('-transactions.created_at', 'transactions.updated_at');
        return $transactions;
    }
    
    public function getAllSales()
    {
        $sales = QueryBuilder::for(Transaction::class)
            ->allowedFilters([
                AllowedFilter::exact('company_id'),
                AllowedFilter::exact('service_id'),
                AllowedFilter::exact('status'),
                AllowedFilter::partial('user.username'),
                AllowedFilter::partial('code'),
                AllowedFilter::scope('start_date'),
                AllowedFilter::scope('end_date'),
            ])
            ->allowedSorts('transactions.created_at', 'transactions.updated_at')
            ->defaultSort('-transactions.created_at', 'transactions.updated_at');
        
        if (!auth()->user()->company->is_default) {
            $sales->where('company_id', auth()->user()->company_id);
        }
        
        return $sales;
    }
}
