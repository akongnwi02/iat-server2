<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 4/20/21
 * Time: 10:52 PM
 */

namespace App\Listeners\Backend\Payment;


use App\Repositories\Backend\SupplyPoint\SupplyPointRepository;

class BillPaymentEventListener
{
    public $supplyPointRepository;
    
    public function __construct(SupplyPointRepository $supplyPointRepository)
    {
        $this->supplyPointRepository = $supplyPointRepository;
    }
    
    public function onConfirmed($event)
    {
        \Log::info('Bill Payment Confirmed', [
            'id' => $event->point->uuid,
        ]);
        $this->supplyPointRepository->autoUpdateTariff($event->point, $event->cycleYear, $event->cycleMonth);
    }
    
    public function onUnconfirmed($event)
    {
        \Log::info('Bill Payment Unconfirmed', [
            'id' => $event->point->uuid,
        ]);
    }
    
    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Payment\BillPaymentConfirmed::class,
            'App\Listeners\Backend\Payment\BillPaymentEventListener@onConfirmed'
        );
        
        $events->listen(
            \App\Events\Backend\Payment\BillPaymentUnconfirmed::class,
            'App\Listeners\Backend\Payment\BillPaymentEventListener@onUnconfirmed'
        );
    }
}