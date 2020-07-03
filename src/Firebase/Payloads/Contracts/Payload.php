<?php


namespace Piscibus\Notifier\Firebase\Payloads\Contracts;

/**
 * Interface Payload
 * @package Piscibus\Notifier\Firebase\Payloads\Contracts
 */
interface Payload
{
    /**
     * Get array representation of the message.
     *
     * @return array
     */
    public function toArray(): array;
}