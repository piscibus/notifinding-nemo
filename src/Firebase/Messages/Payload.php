<?php


namespace Piscibus\Notifier\Firebase\Messages;

use Piscibus\Notifier\Firebase\Messages\Contracts\Notification as NotificationInterface;
use Piscibus\Notifier\Firebase\Messages\Contracts\Payload as PayloadInterface;

/**
 * Class Payload
 * @package Piscibus\Notifier\Firebase\Messages
 */
class Payload implements PayloadInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var Notification
     */
    private $notification;

    /**
     * Payload constructor.
     * @param array $data
     * @param Notification $notification
     */
    public function __construct(Notification $notification, array $data = [])
    {
        $this->data = $data;
        $this->notification = $notification;
    }

    /**
     * @param string $title
     * @param string $body
     * @param array $data
     * @return Payload
     */
    public static function init(string $title, string $body, array $data = [])
    {
        $notification = Notification::init($title, $body);

        return new self($notification, $data);
    }

    /**
     * @inheritDoc
     */
    public function getNotification(): NotificationInterface
    {
        return $this->notification;
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return $this->data;
    }
}
