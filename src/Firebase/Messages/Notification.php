<?php


namespace Piscibus\Notifier\Firebase\Messages;

use Illuminate\Support\Str;
use Piscibus\Notifier\Firebase\Messages\Contracts\Notification as NotificationInterface;
use Piscibus\Notifier\Firebase\Messages\Traits\AndroidTrait;
use Piscibus\Notifier\Firebase\Messages\Traits\IosTrait;
use Piscibus\Notifier\Firebase\Messages\Traits\LocalizationTrait;

/**
 * Class Notification
 * @package Piscibus\Notifier\Firebase\Messages
 * @see https://firebase.google.com/docs/cloud-messaging/http-server-ref
 */
class Notification implements NotificationInterface
{
    use AndroidTrait, IosTrait, LocalizationTrait;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $body;

    /**
     * @var string|null
     */
    private $icon;

    /**
     * @var string|null
     */
    private $sound;

    /**
     * @var string|null
     */
    private $clickAction;

    /**
     * @param string $title
     * @param string $body
     * @return static
     */
    public static function init(string $title, string $body): self
    {
        return (new self())->setTitle($title)->setBody($body);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $name => $value) {
            if (! is_null($value)) {
                $data[Str::snake($name)] = $value;
            }
        }

        return $data;
    }

    /**
     * @param string|null $title
     * @return Notification
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string|null $body
     * @return Notification
     */
    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string|null $icon
     * @return Notification
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @param string|null $sound
     * @return Notification
     */
    public function setSound(?string $sound): self
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @param string|null $clickAction
     * @return Notification
     */
    public function setClickAction(?string $clickAction): self
    {
        $this->clickAction = $clickAction;

        return $this;
    }
}
