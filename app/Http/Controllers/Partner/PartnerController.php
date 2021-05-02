<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/29/21
 * Time: 12:31 AM
 */

namespace App\Http\Controllers\Partner;


use App\Exceptions\Api\BadRequestException;
use App\Exceptions\Api\ForbiddenException;
use App\Exceptions\Api\NotFoundException;
use App\Exceptions\Api\ServerErrorException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\AuthRequest;
use App\Http\Requests\Partner\TransactionStatusRequest;
use App\Http\Resources\Partner\MeterResource;
use App\Http\Resources\Partner\TransactionResource;
use App\Models\Transaction\Transaction;
use App\Repositories\Api\Business\TransactionRepository;
use App\Repositories\Backend\Meter\MeterRepository;
use App\Repositories\Backend\Services\Service\ServiceRepository;
use App\Services\Clients\ClientProvider;
use App\Services\Constants\BusinessErrorCodes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartnerController extends Controller
{
    use ClientProvider;
    
    /**
     * @param Request $request
     * @param ServiceRepository $serviceRepository
     * @param MeterRepository $meterRepository
     * @return MeterResource
     * @throws NotFoundException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function search(Request $request, ServiceRepository $serviceRepository, MeterRepository $meterRepository)
    {
        $this->validate($request, [
            'service_number' => ['required', Rule::exists('meters', 'meter_code')],
            'service_code' => ['required', Rule::exists('services', 'code')]
        ]);
        
        $service = $serviceRepository->findByCode($request->input('service_code'));
        
        $meter = $meterRepository->findByMeterCode($request->input('service_number'))
            ->where('type', $service->category->code)
            ->first();
        
        if ($meter) {
            return new MeterResource($meter);
        }
        
        throw new NotFoundException(BusinessErrorCodes::RESOURCE_NOT_FOUND_ERROR, 'Meter code was not found');
    }
    
    /**
     * @param Request $request
     * @param TransactionRepository $transactionRepository
     * @param MeterRepository $meterRepository
     * @param ServiceRepository $serviceRepository
     * @return TransactionResource
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws ServerErrorException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public function buy(Request $request, TransactionRepository $transactionRepository, MeterRepository $meterRepository, ServiceRepository $serviceRepository)
    {
        \Log::info('New token request from integrator partner', [
            'input' => $request->input(),
            'ip'    => $request->getClientIp(),
        ]);
        
        $this->validate($request, [
            'service_number' => ['required', Rule::exists('meters', 'meter_code')],
            'service_code'   => ['required', Rule::exists('services', 'code')],
            'amount'         => ['required', 'numeric'],
            'external_id'    => ['required', 'string', Rule::unique('transactions', 'external_id')]
        ]);
        
        $meter = $meterRepository->findByMeterCode($request->input('service_number'));
        
        if (!$meter->is_active) {
            throw new ForbiddenException(BusinessErrorCodes::DEACTIVATED_METER, 'Meter is NOT active');
        }
    
        if (!$meter->supply_point_id) {
            throw new ForbiddenException(BusinessErrorCodes::DEACTIVATED_METER, 'The meter is not assigned to a supply point');
        }
        
        $service = $serviceRepository->findByCode($request->input('service_code'));
    
        if ($request->input('amount') < $service->min_amount) {
            throw new BadRequestException(BusinessErrorCodes::MINIMUM_AMOUNT_ERROR, 'The amount entered is less than the minimum amount');
        }
    
        if ($request->input('amount') > $service->max_amount) {
            throw new BadRequestException(BusinessErrorCodes::MAXIMUM_AMOUNT_ERROR, 'The amount entered is more than the maximum amount');
        }
    
        if ($request->input('amount') % $service->step_amount != 0) {
            throw new BadRequestException(BusinessErrorCodes::STEP_AMOUNT_ERROR, "The amount entered must be a multiple of $service->step_amount");
        }
    
        $category = $service->category;
    
        if ($meter->type != $category->code) {
            throw new BadRequestException(BusinessErrorCodes::INVALID_CATEGORY, 'The selected meter does not match with the service category');
        }
        
        $transaction = $transactionRepository->create($request->input());
    
        $processed = $transactionRepository->processTransaction($transaction);
    
        if ($processed) {
            return new TransactionResource($transaction);
        }
    
        throw new ServerErrorException(BusinessErrorCodes::GENERAL_CODE, 'An unexpected error occurred');
    }
    
    /**
     * @param TransactionStatusRequest $request
     * @param $external_id
     * @return TransactionResource
     * @throws NotFoundException
     */
    public function status(TransactionStatusRequest $request, $external_id)
    {
        // TODO Implement the TransactionStatusRequest to only allow transactions belonging to the user
        $transaction = Transaction::where('external_id', $external_id)->first();
        
        if (! $transaction) {
            throw new NotFoundException(BusinessErrorCodes::TRANSACTION_NOT_FOUND, 'transaction not found');
        }
        return new TransactionResource($transaction);
    }
    
    /**
     * @param AuthRequest $request
     * @return mixed
     * @throws ForbiddenException
     */
    public function auth(AuthRequest $request)
    {
        $user = auth()->user();
        
        if (! $user->isActiveAndConfirmed()) {
            
            auth()->logout();
            
            throw new ForbiddenException(BusinessErrorCodes::AUTHORIZATION_ERROR);
        }
        
        $token = \JWTAuth::fromUser($user);

//        event(new UserLoggedIn($user));
        
        return $this->respondWithToken($token);
    }
    
    
}