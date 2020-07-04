<?php


namespace Piscibus\Notifier\Firebase\Channels\Contracts;

interface FcmNotifiable
{
    public function getFcmTokens(): array;
}
