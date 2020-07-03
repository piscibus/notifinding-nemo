<?php


namespace Piscibus\Notifier\Firebase\Payloads\Traits;

use Piscibus\Notifier\Firebase\Payloads\Contracts\Payload;

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
     * @return IosTrait|Payload
     */
    public function setSubtitle(?string $subtitle): Payload
    {
        $this->subtitle = $subtitle;

        return $this;
    }
}
