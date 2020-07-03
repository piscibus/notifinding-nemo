<?php


namespace Piscibus\Notifier\Firebase\Messages;


use Illuminate\Support\Str;
use Piscibus\Notifier\Firebase\Messages\Contracts\Message;

/**
 * Class AndroidMessage
 * @package Piscibus\Notifier\Firebase\Messages
 * @see https://firebase.google.com/docs/cloud-messaging/http-server-ref
 */
class AndroidMessage implements Message
{
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
    private $androidChannelId;

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
    private $tag;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var string|null
     */
    private $clickAction;

    /**
     * @var string|null
     */
    private $bodyLocKey;

    /**
     * @var string|null
     * Optional, JSON array as string
     */
    private $bodyLocArgs;

    /**
     * @var string|null
     */
    private $titleLocKey;

    /**
     * @var string|null
     * Optional, JSON array as string
     */
    private $titleLocArgs;

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $name => $value) {
            if (!is_null($value)) {
                $data[Str::snake($name)] = $value;
            }
        }
        return $data;
    }

    /**
     * @param string|null $title
     * @return AndroidMessage
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string|null $body
     * @return AndroidMessage
     */
    public function setBody(?string $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param string|null $androidChannelId
     * @return AndroidMessage
     */
    public function setAndroidChannelId(?string $androidChannelId): self
    {
        $this->androidChannelId = $androidChannelId;
        return $this;
    }

    /**
     * @param string|null $icon
     * @return AndroidMessage
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param string|null $sound
     * @return AndroidMessage
     */
    public function setSound(?string $sound): self
    {
        $this->sound = $sound;
        return $this;
    }

    /**
     * @param string|null $tag
     * @return AndroidMessage
     */
    public function setTag(?string $tag): self
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @param string|null $color
     * @return AndroidMessage
     */
    public function setColor(?string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param string|null $clickAction
     * @return AndroidMessage
     */
    public function setClickAction(?string $clickAction): self
    {
        $this->clickAction = $clickAction;
        return $this;
    }

    /**
     * @param string|null $bodyLocKey
     * @return AndroidMessage
     */
    public function setBodyLocKey(?string $bodyLocKey): self
    {
        $this->bodyLocKey = $bodyLocKey;
        return $this;
    }

    /**
     * @param array $bodyLocArgs
     * @return AndroidMessage
     */
    public function setBodyLocArgs(array $bodyLocArgs): self
    {
        $this->bodyLocArgs = json_encode($bodyLocArgs);
        return $this;
    }

    /**
     * @param string|null $titleLocKey
     * @return AndroidMessage
     */
    public function setTitleLocKey(?string $titleLocKey): self
    {
        $this->titleLocKey = $titleLocKey;
        return $this;
    }

    /**
     * @param array $titleLocArgs
     * @return AndroidMessage
     */
    public function setTitleLocArgs(array $titleLocArgs): self
    {
        $this->titleLocArgs = json_encode($titleLocArgs);
        return $this;
    }
}