<?php


namespace Piscibus\Notifier\Firebase\Messages;

use Piscibus\Notifier\Firebase\Messages\Contracts\Message as MessageInterface;
use Piscibus\Notifier\Firebase\Messages\Contracts\Payload as PayloadInterface;

/**
 * Class Message
 * @package Piscibus\Notifier\Firebase\Messages
 */
class Message implements MessageInterface
{
    public const PRIORITY_HIGH = 'high';
    public const PRIORITY_NORMAL = 'normal';
    public const PRIORITY_DEFAULT = 'normal';

    /**
     * @var array
     */
    private $registrationIds;

    /**
     * @var string
     */
    private $priority;

    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * Message constructor.
     * @param array $registrationIds
     * @param string $priority
     * @param PayloadInterface $payload
     */
    public function __construct(
        array $registrationIds,
        PayloadInterface $payload,
        string $priority = self::PRIORITY_NORMAL
    ) {
        $this->registrationIds = $registrationIds;
        $this->priority = $priority;
        $this->payload = $payload;
    }

    /**
     * @param array $registrationIds
     * @param string $title
     * @param string $body
     * @param array $data
     * @return static
     */
    public static function init(array $registrationIds, string $title, string $body, array $data = []): self
    {
        return new self($registrationIds, Payload::init($title, $body, $data));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $message = $this->getMessage();
        $body = \GuzzleHttp\json_encode($message);

        return compact('body');
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        $message = [
            'registration_ids' => $this->registrationIds,
            'priority' => $this->priority,
        ];

        return $this->handleEmptyParams($message);
    }

    /**
     * @param array $message
     * @return array
     */
    public function handleEmptyParams(array $message): array
    {
        $data = $this->payload->getData();
        $notification = $this->payload->getNotification()->toArray();

        if (count($data)) {
            $message['data'] = $data;
        }

        if (count($notification)) {
            $message['notification'] = $notification;
        }

        return $message;
    }
}
