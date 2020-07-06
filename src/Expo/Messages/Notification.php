<?php


namespace Piscibus\Notifier\Expo\Messages;

use Illuminate\Support\Str;
use Piscibus\Notifier\Expo\Messages\Contracts\NotificationInterface;
use Piscibus\Notifier\Expo\Messages\Traits\AndroidTrait;
use Piscibus\Notifier\Expo\Messages\Traits\IosTrait;

class Notification implements NotificationInterface
{
    use IosTrait, AndroidTrait;

    private $data;

    private $title;

    private $body;

    private $ttl;

    private $expiration;

    private $priority;

    /**
     * @param $title
     * @param $body
     * @param array $data
     * @return static
     */
    public static function init($title, $body, $data = []): self
    {
        return (new self())->setTitle($title)->setBody($body)->setData($data);
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data = []): self
    {
        $this->data = json_encode($data, JSON_FORCE_OBJECT);

        return $this;
    }

    /**
     * @param string|null $body
     * @return $this
     */
    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $name => $value) {
            if (! is_null($value)) {
                $data[Str::camel($name)] = $value;
            }
        }

        return $data;
    }

    /**
     * @param int|null $ttl
     * @return $this
     */
    public function setTtl(?int $ttl): self
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * @param int|null $expiration
     * @return $this
     */
    public function setExpiration(?int $expiration): self
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * @param string|null $pirority
     * @return $this
     */
    public function setPriority(?string $pirority): self
    {
        $this->priority = $pirority;

        return $this;
    }
}
