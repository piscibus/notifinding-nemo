<?php


namespace Piscibus\Notifier\Firebase\Messages;


use Piscibus\Notifier\Firebase\Messages\Contracts\Notification;
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
    public function __construct(array $data, Notification $notification)
    {
        $this->data = $data;
        $this->notification = $notification;
    }

    /**
     * @inheritDoc
     */
    public function getNotification(): Notification
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