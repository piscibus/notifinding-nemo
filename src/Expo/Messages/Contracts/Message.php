<?php


namespace Piscibus\Notifier\Expo\Messages\Contracts;


interface Message
{
    /**
     * @return array
     */
    public function toArray(): array;
}
