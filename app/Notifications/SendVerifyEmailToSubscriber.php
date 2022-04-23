<?php

namespace App\Notifications;

use App\Models\Subscriber;
use Carbon\Carbon;
use Config;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lang;
use Route;
use URL;

class SendVerifyEmailToSubscriber extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["mail"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return $this->buildMailMessage($this->verificationUrl($notifiable));
    }

    /**
     * Get the verify email notification mail message for the given URL.
     *
     * @param  string  $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     *
     * @source Illuminate\Notifications stoled from laravel source
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage())
            ->subject(Lang::get("Verify Email Address"))
            ->greeting(Lang::get("Hello!"))
            ->line(
                Lang::get(
                    "Please click the button below to verify your email address."
                )
            )
            ->action(Lang::get("Verify Email Address"), $url)
            ->line(
                Lang::get(
                    "If you did not create an account, no further action is required."
                )
            );
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     * 
     * @source Illuminate\Notifications stoled from laravel source
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            "newsletter.verify",
            Carbon::now()->addDays(
                Config::get("auth.verification.expire", 3)
            ),
            [
                "id" => $notifiable->getHashId(),
                "hashed" => Subscriber::getVerifiationHash($notifiable->email),
            ]
        );
    }
}
