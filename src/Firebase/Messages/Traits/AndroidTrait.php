<?php


namespace Piscibus\Notifier\Firebase\Messages\Traits;

use Piscibus\Notifier\Firebase\Messages\Contracts\Notification;

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
     * @return Notification|AndroidTrait
     */
    public function setBadge(?string $badge): Notification
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @param string|null $tag
     * @return Notification|AndroidTrait
     */
    public function setTag(?string $tag): Notification
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @param string|null $androidChannelId
     * @return Notification|AndroidTrait
     */
    public function setAndroidChannelId(?string $androidChannelId): Notification
    {
        $this->androidChannelId = $androidChannelId;

        return $this;
    }

    /**
     * @param string|null $color
     * @return Notification|AndroidTrait
     */
    public function setColor(?string $color): Notification
    {
        $this->color = $color;

        return $this;
    }
}
