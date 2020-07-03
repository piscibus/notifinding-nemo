<?php


namespace Piscibus\Notifier\Firebase\Messages\Traits;

use Piscibus\Notifier\Firebase\Messages\Notification;

trait LocalizationTrait
{
    /**
     * @var string|null
     */
    protected $titleLocKey;

    /**
     * @var string|null
     * Optional, JSON array as string
     */
    protected $bodyLocArgs;

    /**
     * @var string|null
     */
    protected $bodyLocKey;

    /**
     * @var string|null
     * Optional, JSON array as string
     */
    protected $titleLocArgs;

    /**
     * @param array $titleLocArgs
     * @return Notification|LocalizationTrait
     */
    public function setTitleLocArgs(array $titleLocArgs): Notification
    {
        $this->titleLocArgs = json_encode($titleLocArgs);

        return $this;
    }

    /**
     * @param array $bodyLocArgs
     * @return Notification|LocalizationTrait
     */
    public function setBodyLocArgs(array $bodyLocArgs): Notification
    {
        $this->bodyLocArgs = json_encode($bodyLocArgs);

        return $this;
    }

    /**
     * @param string|null $titleLocKey
     * @return Notification|LocalizationTrait
     */
    public function setTitleLocKey(?string $titleLocKey): Notification
    {
        $this->titleLocKey = $titleLocKey;

        return $this;
    }

    /**
     * @param string|null $bodyLocKey
     * @return Notification|LocalizationTrait
     */
    public function setBodyLocKey(?string $bodyLocKey): Notification
    {
        $this->bodyLocKey = $bodyLocKey;

        return $this;
    }
}
