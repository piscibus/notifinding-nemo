<?php

namespace Piscibus\Notifier\Expo\Channels;

use Piscibus\Notifier\Expo\Channels\Contracts\Channel;
use Piscibus\Notifier\Expo\Channels\Contracts\ExpoNotifiable;
use Piscibus\Notifier\Expo\Channels\Contracts\ExpoNotification;
use Piscibus\Notifier\Expo\Clients\ExpoClient;

class ExpoChannel implements Channel
{
    /**
     * Send the given notification.
     * @param ExpoNotifiable $notifiable
     * @param ExpoNotification $message
     * @return void
     */
    public function send(ExpoNotifiable $notifiable, ExpoNotification $message): void
    {
        $client = new ExpoClient();
        $client->send($message->toExpo($notifiable));
    }
}
