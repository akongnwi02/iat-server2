<?php

namespace App\Listeners\Frontend\Auth;

use Carbon\Carbon;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        $ip_address = request()->getClientIp();

        // Update the logging in users time & IP
        $event->user->fill([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $ip_address,
            'user_agent' => request()->header('User-Agent'),
        ]);

        // Update the timezone via IP address
        $geoip = geoip($ip_address);

        $event->user->fill([
            'location' => $geoip['city'] . ' / ' . $geoip['country'],
        ]);

        // Do some cleanup
        $event->user->reset_confirmed = 0;

        $event->user->save();

        \Log::info('User Logged In: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        \Log::info('User Logged Out: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        \Log::info('User Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onProviderRegistered($event)
    {
        \Log::info('User Provider Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onResetConfirmed($event)
    {
        \Log::info('User Password Reset Confirmed: '.$event->user->full_name);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Frontend\Auth\UserLoggedIn::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onLoggedIn'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserLoggedOut::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onLoggedOut'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserRegistered::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onRegistered'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserProviderRegistered::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onProviderRegistered'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserConfirmed::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onConfirmed'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserResetConfirmed::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onResetConfirmed'
        );
    }
}
