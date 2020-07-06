<?php

namespace Piscibus\Notifier\Expo\Messages\Traits;

use Piscibus\Notifier\Expo\Messages\Contracts\Notification;

trait IosTrait
{
    private $subtitle;

    private $sound;

    private $badge;

    /**
     * @param string|null $subTitle
     * @return Notification|IosTrait
     */
    public function setSubTitle(?string $subTitle): Notification
    {
        $this->subtitle = $subTitle;

        return $this;
    }

    /**
     * @param string $sound
     * @return $this|Notification
     */
    public function setSound(string $sound = 'default'): Notification
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @param int $badge
     * @return Notification|$this
     */
    public function setBadge(?int $badge): Notification
    {
        $this->badge = $badge;

        return $this;
    }
}
