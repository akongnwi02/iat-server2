<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/9/20
 * Time: 8:15 PM
 */

namespace App\Repositories\Backend\Movement;

use App\Events\Backend\Movement\MovementCreated;
use App\Exceptions\Api\ServerErrorException;
use App\Exceptions\GeneralException;
use App\Models\Account\Account;
use App\Models\Account\Movement;
use App\Models\Account\MovementType;
use App\Models\Company\Company;
use App\Repositories\Backend\System\CurrencyRepository;
use App\Services\Constants\BusinessErrorCodes;
use function foo\func;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * The account movements are referenced by the destination. e.g withdrawal and deposit used indicate debit or credit
 * on the destination account
 *
 * Class MovementRepository
 * @package App\Repositories\Backend\Movement
 *
 */
class MovementRepository
{
    public $currencyRepository;
    
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }
    
    /**
     * @param $account
     * @param $data
     * @return mixed
     * @throws \Throwable
     */
    public function floatAccount($account, $data)
    {
        $movement = new Movement();
        $movement->code = Movement::generateCode();
        $movement->amount = $data['amount'];
        $movement->type_id = MovementType::where('name', config('business.movement.type.float'))->first()->uuid;
        $movement->user_id = auth()->user()->uuid;
        $movement->company_id = auth()->user()->company->uuid;
        $movement->currency_id = $data['currency_id'];
        $movement->destinationaccount_id = $account->uuid;
        $movement->is_complete = true;
    
        if ($movement->save()) {
            event(new MovementCreated($movement));
            return $movement;
        }
    
        throw new GeneralException(__('exceptions.backend.movement.create_error'));
    }
    
    /**
     * @param $account
     * @param $data
     * @return mixed
     * @throws \Throwable
     */
    public function creditAccount($account, $data)
    {
        $movement = new Movement();
        $movement->code = Movement::generateCode();
        $movement->amount = $data['amount'];
        $movement->type_id = MovementType::where('name', config('business.movement.type.deposit'))->first()->uuid;
        $movement->user_id = auth()->user()->uuid;
        $movement->company_id = auth()->user()->company->uuid;
        $movement->currency_id = $data['currency_id'];
        $movement->sourceaccount_id = $data['direction'] == 'IN' ? auth()->user()->company->account->uuid : $account->uuid;
        $movement->destinationaccount_id = $data['direction'] == 'OUT' ? auth()->user()->company->account->uuid : $account->uuid;
        $movement->is_complete = true;
    
        $double = clone $movement;
        $double->type_id = MovementType::where('name', config('business.movement.type.withdrawal'))->first()->uuid;
        $double->sourceaccount_id = $movement->destinationaccount_id;
        $double->destinationaccount_id = $movement->sourceaccount_id;
    
        return \DB::transaction(function () use ($movement, $double) {
    
            if ($movement->save() && $double->save()) {
//                event(Accountfdfs($movement, $double));
                return true;
            }
            
            throw new GeneralException(__('exceptions.backend.movement.create_error'));
        });
    }
    
    public function getAccountMovements($account)
    {
        $movements = QueryBuilder::for(Movement::class)
            ->where('destinationaccount_id', $account->uuid)
            ->defaultSort('-movements.created_at');
    
        return $movements;
    }
    
    /**
     * @param $account
     * @param $transaction
     * @return mixed
     * @throws \Throwable
     */
    public function registerSale($account, $transaction)
    {
        $movement = new Movement();
        $movement->code = Movement::generateCode();
        $movement->amount = $transaction->service->is_money_withdrawal ? $transaction->amount : $transaction->total_customer_amount;
        $movement->type_id = $transaction->service->is_money_withdrawal
            ? MovementType::where('name', config('business.movement.type.sale'))->first()->uuid
            : MovementType::where('name', config('business.movement.type.purchase'))->first()->uuid;
        $movement->user_id = $transaction->user->uuid;
        $movement->company_id = @$transaction->company->uuid;
        $movement->service_id = $transaction->service_id;
        $movement->is_complete = false;
        $movement->currency_id = $this->currencyRepository->findByCode($transaction->currency_code)->uuid;
        $movement->destinationaccount_id = $account->uuid;
        
        $transaction->paymentaccount = $account->code;
        $transaction->movement_code = $movement->code;
        return \DB::transaction(function () use ($movement, $transaction) {
            if ($movement->save() && $transaction->save()) {
//                event(Accountfdfs($movement));
                return true;
            }
    
            throw new ServerErrorException(BusinessErrorCodes::GENERAL_CODE, 'Error creating sale');
        });
    }
    
    public function registerOrderSale($account, $transaction)
    {
        $movement = new Movement();
        $movement->code = Movement::generateCode();
        // deduct provider fee from order amount
        $movement->amount = $transaction->amount - $transaction->provider_service_fee;
        $movement->type_id = MovementType::where('name', config('business.movement.type.sale'))->first()->uuid;
        $movement->user_id = $transaction->user->uuid;
        $movement->company_id = @$transaction->company->uuid;
        $movement->service_id = $transaction->service_id;
        $movement->is_complete = false;
        $movement->currency_id = $this->currencyRepository->findByCode($transaction->currency_code)->uuid;
        $movement->destinationaccount_id = $account->uuid;
    
        $transaction->paymentaccount = $account->code;
        $transaction->movement_code = $movement->code;
        return \DB::transaction(function () use ($movement, $transaction) {
            if ($movement->save() && $transaction->save()) {
//                event(Accountfdfs($movement));
                return true;
            }
            throw new ServerErrorException(BusinessErrorCodes::GENERAL_CODE, 'Error creating sale');
        });
    }
    
    public function reverseMovements($code)
    {
        $movements = Movement::where('code', $code)->get();
    
        if ($movements) {
            foreach ($movements as $movement) {
                $movement->is_reversed = true;
                $movement->reversed_at   = now();
                $movement->save();
            }
        }
    }
    
    public function completeMovements($code)
    {
        $movements = Movement::where('code', $code)->get();
    
        if ($movements) {
            foreach ($movements as $movement) {
                $movement->is_complete = true;
                $movement->save();
            }
        }
    }
}
