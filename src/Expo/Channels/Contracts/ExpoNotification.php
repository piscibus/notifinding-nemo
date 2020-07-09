<?php

namespace Piscibus\Notifier\Expo\Channels\Contracts;


use Piscibus\Notifier\Expo\Messages\Contracts\Message;

interface ExpoNotification
{
    public function toExpo(ExpoNotifiable $notifiable): Message;
}
