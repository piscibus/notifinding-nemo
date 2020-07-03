<?php


namespace Piscibus\Notifier\Firebase\Messages\Contracts;

interface Payload
{
    /**
     * @return Notification
     */
    public function getNotification(): Notification;

    /**
     * @return array
     */
    public function getData(): array;
}
