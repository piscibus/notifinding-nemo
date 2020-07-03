<?php


namespace Piscibus\Notifier\Firebase\Payloads\Traits;

use Piscibus\Notifier\Firebase\Payloads\Contracts\Payload;

/**
 * Interface AndroidTrait
 * @package Piscibus\Notifier\Firebase\Payloads\Traits
 */
trait AndroidTrait
{
    /**
     * @var string|null
     */
    protected $badge;

    /**
     * @var string|null
     */
    protected $tag;

    /**
     * @var string|null
     */
    protected $androidChannelId;

    /**
     * @var string|null
     */
    protected $color;

    /**
     * @param string|null $badge
     * @return Payload|AndroidTrait
     */
    public function setBadge(?string $badge): Payload
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @param string|null $tag
     * @return Payload|AndroidTrait
     */
    public function setTag(?string $tag): Payload
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @param string|null $androidChannelId
     * @return Payload|AndroidTrait
     */
    public function setAndroidChannelId(?string $androidChannelId): Payload
    {
        $this->androidChannelId = $androidChannelId;

        return $this;
    }

    /**
     * @param string|null $color
     * @return Payload|AndroidTrait
     */
    public function setColor(?string $color): Payload
    {
        $this->color = $color;

        return $this;
    }
}
