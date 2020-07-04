<?php


namespace Piscibus\Notifier\Firebase\Channels\Contracts;

use Illuminate\Notifications\Notification;

/**
 * Interface Channel
 * @package Piscibus\Notifier\Channels\Contracts
 */
interface Channel
{
    /**
     * @param FcmNotifiable $notifiable
     * @param Notification $notification
     */
    public function send(FcmNotifiable $notifiable, Notification $notification): void;
}
