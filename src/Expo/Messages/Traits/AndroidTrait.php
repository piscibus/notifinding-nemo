<?php


namespace Piscibus\Notifier\Expo\Messages\Traits;

use Piscibus\Notifier\Expo\Messages\Contracts\NotificationInterface;

trait AndroidTrait
{
    private $channelId;

    /**
     * @param string|null $channelId
     * @return NotificationInterface|$this
     */
    public function setChannelId(?string $channelId): NotificationInterface
    {
        $this->channelId = $channelId;

        return $this;
    }
}
