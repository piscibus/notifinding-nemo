<?php

use Piscibus\Notifier\Notifier;

if (! function_exists('notifindingNemo')) {
    /**
     * @return Notifier
     */
    function notifindingNemo()
    {
        return new Notifier();
    }
}
