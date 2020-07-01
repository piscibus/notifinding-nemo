<?php

namespace Piscibus\Notifier;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Piscibus\Notifier\Notifier
 */
class NotifierFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'notifier';
    }
}
