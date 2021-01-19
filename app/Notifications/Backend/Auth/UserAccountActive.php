<?php

namespace App\Notifications\Backend\Auth;

use App\Channels\SmsChannel;
use App\Services\Notifications\Sms\SmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserAccountActive.
 */
class UserAccountActive extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        if ($notifiable->notification_channel == 'sms') {
            return [SmsChannel::class];
        }
        return [$notifiable->notification_channel];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject(app_name())
            ->line(__('strings.emails.auth.account_confirmed'))
            ->action(__('labels.frontend.auth.login_button'), route('frontend.auth.login'))
            ->line(__('strings.emails.auth.thank_you_for_using_app'));
    }
    
    
    public function toSms($notifiable)
    {
        return (new SmsMessage())
            ->content(__('strings.emails.auth.account_confirmed'))
            ->content(__('strings.emails.auth.login_sms'));
    }
}
