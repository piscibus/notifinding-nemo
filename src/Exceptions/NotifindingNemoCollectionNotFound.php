<?php

namespace Piscibus\Notifier\Exceptions;

use Exception;

class NotifindingNemoCollectionNotFound extends Exception
{
    public function __construct($class)
    {
        parent::__construct('Collection Class not supported [' . $class . ']');
    }
}
