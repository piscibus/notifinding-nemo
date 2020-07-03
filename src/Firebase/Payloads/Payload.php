<?php


namespace Piscibus\Notifier\Firebase\Payloads;

use Illuminate\Support\Str;
use Piscibus\Notifier\Firebase\Payloads\Contracts\Payload as PayloadInterface;
use Piscibus\Notifier\Firebase\Payloads\Traits\AndroidTrait;
use Piscibus\Notifier\Firebase\Payloads\Traits\IosTrait;
use Piscibus\Notifier\Firebase\Payloads\Traits\LocalizationTrait;

/**
 * Class Payload
 * @package Piscibus\Notifier\Firebase\Messages
 * @see https://firebase.google.com/docs/cloud-messaging/http-server-ref
 */
class Payload implements PayloadInterface
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
     * @return Payload
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string|null $body
     * @return Payload
     */
    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string|null $icon
     * @return Payload
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @param string|null $sound
     * @return Payload
     */
    public function setSound(?string $sound): self
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @param string|null $clickAction
     * @return Payload
     */
    public function setClickAction(?string $clickAction): self
    {
        $this->clickAction = $clickAction;

        return $this;
    }
}
