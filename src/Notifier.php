<?php

namespace Piscibus\Notifier;

use Exception;
use Illuminate\Support\Collection;
use Piscibus\Notifier\Collections\FireNemoCollection;
use Piscibus\Notifier\Exceptions\NotifindingNemoCollectionNotFound;
use Piscibus\Notifier\Jobs\NotifierJob;

class Notifier
{
    protected $resources = [];

    /**
     * @param Collection $resource
     * @return $this
     * @throws NotifindingNemoCollectionNotFound
     */
    public function addResource(Collection $resource): self
    {
        $resourceClass = get_class($resource);
        switch ($resourceClass) {
            case FireNemoCollection::class:
                break;
            default:
                throw new NotifindingNemoCollectionNotFound($resource);
        }
        $this->resources[] = $resource;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function send()
    {
        if (count($this->resources) == 0) {
            throw new Exception('NotifindingNemo Dose not have any resources');
        }
        NotifierJob::dispatch($this->resources);
    }
}
