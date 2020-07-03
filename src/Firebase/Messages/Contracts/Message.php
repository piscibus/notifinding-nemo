<?php


namespace Piscibus\Notifier\Firebase\Messages\Contracts;

/**
 * Interface Message
 * @package Piscibus\Notifier\Firebase\Messages\Contracts
 */
interface Message
{
    /**
     * @return array
     */
    public function toArray(): array;
}
