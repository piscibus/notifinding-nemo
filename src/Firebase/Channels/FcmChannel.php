<?php


namespace Piscibus\Notifier\Firebase\Channels;

use Piscibus\Notifier\Firebase\Channels\Contracts\Channel;
use Piscibus\Notifier\Firebase\Channels\Contracts\FcmNotifiable;
use Piscibus\Notifier\Firebase\Channels\Contracts\FcmNotification;
use Piscibus\Notifier\Firebase\Clients\FcmClient;

/**
 * Class FcmChannel
 * @package Piscibus\Notifier\Channels
 */
class FcmChannel implements Channel
{
    /**
     * @inheritDoc
     */
    public function send(FcmNotifiable $notifiable, FcmNotification $notification): void
    {
        $key = config('notifier.firebase.key');
        $client = new FcmClient($key);
        $client->send($notification->toFcm($notifiable));
    }
}
