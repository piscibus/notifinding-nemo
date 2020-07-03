<?php


namespace Piscibus\Notifier\Firebase\Payloads\Traits;

use Piscibus\Notifier\Firebase\Payloads\Payload;

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
     * @return Payload|LocalizationTrait
     */
    public function setTitleLocArgs(array $titleLocArgs): Payload
    {
        $this->titleLocArgs = json_encode($titleLocArgs);

        return $this;
    }

    /**
     * @param array $bodyLocArgs
     * @return Payload|LocalizationTrait
     */
    public function setBodyLocArgs(array $bodyLocArgs): Payload
    {
        $this->bodyLocArgs = json_encode($bodyLocArgs);

        return $this;
    }

    /**
     * @param string|null $titleLocKey
     * @return Payload|LocalizationTrait
     */
    public function setTitleLocKey(?string $titleLocKey): Payload
    {
        $this->titleLocKey = $titleLocKey;

        return $this;
    }

    /**
     * @param string|null $bodyLocKey
     * @return Payload|LocalizationTrait
     */
    public function setBodyLocKey(?string $bodyLocKey): Payload
    {
        $this->bodyLocKey = $bodyLocKey;

        return $this;
    }
}
