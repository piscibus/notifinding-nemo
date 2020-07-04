<?php


namespace Piscibus\Notifier\Firebase\Channels\Contracts;

use Piscibus\Notifier\Firebase\Messages\Contracts\Message;

/**
 * Interface FcmNotification
 * @package Piscibus\Notifier\Channels\Contracts
 */
interface FcmNotification
{
    /**
     * Get the FCM message of the notification
     *
     * @param $notifiable
     * @return Message
     */
    public function toFcm(FcmNotifiable $notifiable): Message;
}
