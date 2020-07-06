<?php


namespace Piscibus\Notifier\Expo\Messages\Traits;

use Piscibus\Notifier\Expo\Messages\Contracts\Notification;

trait AndroidTrait
{
    private $channelId;

    /**
     * @param string|null $channelId
     * @return Notification|$this
     */
    public function setChannelId(?string $channelId): Notification
    {
        $this->channelId = $channelId;

        return $this;
    }
}
