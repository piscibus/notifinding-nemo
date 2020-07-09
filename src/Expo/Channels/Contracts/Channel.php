<?php


namespace Piscibus\Notifier\Expo\Channels\Contracts;


interface Channel
{
    /**
     * @param ExpoNotifiable $notifiable
     * @param ExpoNotification $notification
     */
    public function send(ExpoNotifiable $notifiable, ExpoNotification $notification): void;
}
