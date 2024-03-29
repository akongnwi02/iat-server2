<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 7/10/20
 * Time: 12:46 AM
 */

namespace App\Repositories\Api\Merchant\V1;


use App\Exceptions\Api\ForbiddenException;
use App\Exceptions\GeneralException;
use App\Models\Merchant\MerchantItem;
use App\Models\Merchant\MerchantOrder;
use App\Repositories\Backend\Services\Service\PaymentMethodRepository;
use App\Repositories\Backend\System\CurrencyRepository;
use App\Services\Constants\BusinessErrorCodes;
use Spatie\QueryBuilder\QueryBuilder;

class OrderRepository
{
    public $paymentMethodRepository;
    public $currencyRepository;
    
    public function __construct(PaymentMethodRepository $paymentMethodRepository, CurrencyRepository $currencyRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
        $this->currencyRepository = $currencyRepository;
    }
    
    public function create($data, $user)
    {
    
        return \DB::transaction(function () use ($data, $user) {
            $order = MerchantOrder::create([
                'customer_name'    => $data['customer']['name'],
                'customer_phone'   => $data['customer']['phone'],
                'customer_email'   => $data['customer']['email'],
                'customer_address' => $data['customer']['address'],
                'external_id'      => $data['external_id'],

                'payment_total_amount' => $data['total_amount'],
                'payment_currency_code' => $data['currency_code'],
                
                'total_amount'     => $this->currencyRepository->convertAmount($data['total_amount'], $data['currency_code']),
                'currency_code'    => $this->currencyRepository->getDefaultCurrency()->code,
                
                'description'      => $data['description'],
                'notification_url' => $data['notification_url'],
                'return_url'       => $data['return_url'],
                'company_id'       => @$user->company->uuid,
                'user_id'          => $user->uuid,
                'code'             => MerchantOrder::generateCode(),
                'status'           => config('business.transaction.status.created'),
            ]);
            
            foreach ($data['items'] as $item) {
                $order->items()->save(new MerchantItem($item));
            }
    
            if ($order) {
//                event(new MerchantOrderCreated());
                return $order;
            }
            throw new GeneralException(BusinessErrorCodes::TRANSACTION_CREATION_ERROR, 'There was an error creating the order');
        });
    }
    
    public function show($external_id)
    {
        return MerchantOrder::where('external_id', $external_id)
            ->when(! auth()->user()->company->is_default, function ($query) {
                $query->where('company_id', auth()->user()->compny_id);
            })->firstOrFail();
    }
    
    public function destroy($external_id)
    {
        $order = MerchantOrder::where('external_id', $external_id)
            ->when(! auth()->user()->company->is_default, function ($query) {
                $query->where('company_id', auth()->user()->compny_id);
            })->firstOrFail();
        if ($order->status == config('business.transaction.status.created')) {
            return $order->delete();
        } else {
            throw new ForbiddenException(BusinessErrorCodes::TRANSACTION_DELETE_ERROR, "Order with status $order->status cannot be deleted");
        }
    }
    
    public function getAllOrders()
    {
        $orders = QueryBuilder::for(MerchantOrder::class)
            ->allowedSorts('merchant_orders.created_at', 'merchant_orders.updated_at')
            ->defaultSort('-merchant_orders.created_at', 'merchant_orders.updated_at');
        
        if (!auth()->user()->company->is_default) {
            $orders->where('company_id', auth()->user()->company_id);
        }
        
        return $orders;
    }
}
