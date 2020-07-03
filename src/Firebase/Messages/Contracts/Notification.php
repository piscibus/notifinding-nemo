<?php


namespace Piscibus\Notifier\Firebase\Messages\Contracts;

/**
 * Interface Payload
 * @package Piscibus\Notifier\Firebase\Payloads\Contracts
 */
interface Notification
{
    /**
     * Get array representation of the notification.
     *
     * @return array
     */
    public function toArray(): array;
}
