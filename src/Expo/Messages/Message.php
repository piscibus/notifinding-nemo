<?php


namespace Piscibus\Notifier\Expo\Messages;

use Piscibus\Notifier\Expo\Messages\Contracts\NotificationInterface;

class Message implements Contracts\Message
{
    public const PRIORITY_HIGH = 'high';
    public const PRIORITY_NORMAL = 'normal';
    public const PRIORITY_DEFAULT = 'default';


    /**
     * @var NotificationInterface
     */
    private $notification;
    /**
     * @var string
     */
    private $priority;
    /**
     * @var array
     */
    private $to;


    /**
     * Message constructor.
     * @param array $to
     * @param NotificationInterface $notification
     * @param string $priority
     */
    public function __construct(array $to, NotificationInterface $notification, $priority = self::PRIORITY_DEFAULT)
    {
        $this->to = $to;
        $this->notification = $notification;
        $this->priority = $priority;
    }

    public static function init(array $to, string $title = '', string $body = '', array $data = []): self
    {
        return (new self($to, Notification::init($title, $body, $data)));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->getMessage();
    }

    private function getMessage(): array
    {
        $notificationData = $this->notification->toArray();

        if (count($notificationData)) {
            foreach ($notificationData as $key => $value) {
                $message[$key] = $value;
            }
        }

        $message["to"] = $this->to;

        $message["priority"] = $this->priority;

        return $message;
    }
}
