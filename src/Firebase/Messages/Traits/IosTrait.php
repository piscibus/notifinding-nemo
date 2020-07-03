<?php


namespace Piscibus\Notifier\Firebase\Messages\Traits;

use Piscibus\Notifier\Firebase\Messages\Contracts\Notification;

/**
 * Trait IosTrait
 * @package Piscibus\Notifier\Firebase\Payloads
 */
trait IosTrait
{
    /**
     * @var string|null
     */
    protected $subtitle;

    /**
     * @param string|null $subtitle
     * @return IosTrait|Notification
     */
    public function setSubtitle(?string $subtitle): Notification
    {
        $this->subtitle = $subtitle;

        return $this;
    }
}
