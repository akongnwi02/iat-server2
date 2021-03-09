<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/15/20
 * Time: 3:37 PM
 */

namespace App\Repositories\Api\Business;

use App\Exceptions\Api\BadRequestException;
use App\Exceptions\Api\ForbiddenException;
use App\Exceptions\Api\NotFoundException;
use App\Exceptions\Api\ServerErrorException;
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
use App\Services\Constants\BusinessErrorCodes;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TransactionRepository
{
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
        return \DB::transaction(function () use ($data) {
            // is user trying to top up his account balance ?
            $accountTopUp = false;
            
            /*
             * get the service
             */
            $service  = $this->serviceRepository->findByCode($data['service_code']);
            $category = $service->category;
            $meter = $this->meterRepository->findByMeterCode($data['service_number']);
            $supplyPoint = $meter->supplyPoint;
            
            // make sure meter is active and assigned
            if (! $meter->is_active) {
                throw new GeneralException(__('exceptions.backend.sales.meter_inactive'));
            }
    
            if (! $meter->supply_point_id) {
                throw  new GeneralException(__('exceptions.backend.sales.meter_unassigned'));
            }
            
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
            $transaction->destination      = $data['service_number'];
            $transaction->status           = config('business.transaction.status.created');
            
            
            $transaction->customer_servicecommission_id = @$customerServiceCommission->uuid;
            
            $transaction->service_id    = $service->uuid;
            $transaction->category_id   = $category->uuid;
            $transaction->category_code = $category->code;

            $transaction->system_commission = $customerServiceFee;
            
            $transaction->customer_phone = @$data['phone_number'];
            
            if ($transaction->save()) {
                return $transaction;
            }
            
            throw new ServerErrorException(BusinessErrorCodes::TRANSACTION_CREATION_ERROR, 'Error creating transaction');
        });
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
    public function processPayment($transaction)
    {
        // verify if user has sufficient balance
        $userAccount = $transaction->user->account;
        
        if (!$userAccount->is_active) {
            throw new ForbiddenException(BusinessErrorCodes::ACCOUNT_LIMITED, 'Your account has been limited.');
        }
        if ($transaction->service->is_money_withdrawal) {
            $this->movementRepository->registerSale($userAccount, $transaction);
            return true;
        }
        
        if (($userAccount->getBalance() >= $transaction->total_customer_amount)) {
            $this->movementRepository->registerSale($userAccount, $transaction);
            return true;
            
        } elseif (
            $transaction->company->direct_polling
            && $transaction->company->account->is_active
            && $transaction->company->account->getBalance() > $transaction->total_customer_amount
        ) {
            $companyAccount = $transaction->company->account;
            
            $this->movementRepository->registerSale($companyAccount, $transaction);
            return true;
        } else {
            throw new BadRequestException(BusinessErrorCodes::INSUFFICIENT_ACCOUNT_BALANCE, 'Your account balance is insufficient for this transaction');
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
