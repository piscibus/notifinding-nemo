<?php


namespace Piscibus\Notifier\Expo\Messages;

use Piscibus\Notifier\Expo\Messages\Contracts\Notification as NotificationInterface;

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
        return new self($to, Notification::init($title, $body, $data));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return ['form_params' => $this->getMessage()];
    }

    /**
     * @return array
     */
    private function getMessage(): array
    {
        $message = $this->parseNotification();
        $message["to"] = $this->to;
        $message["priority"] = $this->priority;

        return $message;
    }

    /**
     * @return array
     */
    private function parseNotification(): array
    {
        $message = [];
        $notificationData = $this->notification->toArray();
        if (count($notificationData)) {
            foreach ($notificationData as $key => $value) {
                $message[$key] = $value;
            }
        }

        return $message;
    }
}
