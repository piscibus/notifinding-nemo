<?php


namespace Piscibus\Notifier\Firebase\Channels\Contracts;

/**
 * Interface Channel
 * @package Piscibus\Notifier\Channels\Contracts
 */
interface Channel
{
    /**
     * @param FcmNotifiable $notifiable
     * @param FcmNotification $notification
     */
    public function send(FcmNotifiable $notifiable, FcmNotification $notification): void;
}
