<?php


namespace Piscibus\Notifier\Firebase\Messages;

use Piscibus\Notifier\Firebase\Messages\Contracts\Message as MessageInterface;
use Piscibus\Notifier\Firebase\Messages\Contracts\Payload;

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
     * @var Payload
     */
    private $payload;

    /**
     * Message constructor.
     * @param array $registrationIds
     * @param string $priority
     * @param Payload $payload
     */
    public function __construct(array $registrationIds, Payload $payload, string $priority = self::PRIORITY_NORMAL)
    {
        $this->registrationIds = $registrationIds;
        $this->priority = $priority;
        $this->payload = $payload;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'registration_ids' => $this->registrationIds,
            'priority' => $this->priority,
            'data' => $this->payload->getData(),
            'notification' => $this->payload->getNotification()->toArray(),
        ];
    }
}
