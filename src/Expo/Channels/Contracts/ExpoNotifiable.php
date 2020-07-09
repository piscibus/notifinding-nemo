<?php

namespace Piscibus\Notifier\Expo\Channels\Contracts;

interface ExpoNotifiable
{
    public function getExpoTokens(): array;
}
