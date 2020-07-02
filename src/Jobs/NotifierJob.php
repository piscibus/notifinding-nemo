<?php

namespace Piscibus\Notifier\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Piscibus\Notifier\Collections\FireNemoCollection;

class NotifierJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $resources;


    public function __construct(array $resources)
    {
        $this->resources = $resources;
    }

    public function handle()
    {
        foreach ($this->resources as $resource) {
            if ($resource instanceof FireNemoCollection) {
                FireNemoJob::dispatch($resource);
            }
        }
    }
}
