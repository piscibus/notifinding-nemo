<?php

namespace Piscibus\Notifier\Expo\Messages\Traits;

use Piscibus\Notifier\Expo\Messages\Contracts\NotificationInterface;

trait IosTrait
{
    private $subtitle;

    private $sound;

    private $badge;

    /**
     * @param string|null $subTitle
     * @return NotificationInterface|IosTrait
     */
    public function setSubTitle(?string $subTitle): NotificationInterface
    {
        $this->subtitle = $subTitle;

        return $this;
    }

    /**
     * @param string $sound
     * @return $this|NotificationInterface
     */
    public function setSound(string $sound = 'default'): NotificationInterface
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @param int $badge
     * @return NotificationInterface|$this
     */
    public function setBadge(?int $badge): NotificationInterface
    {
        $this->badge = $badge;

        return $this;
    }
}
