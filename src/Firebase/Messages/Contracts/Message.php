<?php


namespace Piscibus\Notifier\Firebase\Messages\Contracts;


interface Message
{
    /**
     * Get array representation of the message.
     *
     * @return array
     */
    public function toArray(): array;
}