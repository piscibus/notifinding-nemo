<?php

namespace Piscibus\Notifier\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Piscibus\Notifier\Collections\FireNemoCollection;
use Piscibus\Notifier\FireNemo\FireNemoManager;

class FireNemoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $fireNemoCollection;


    public function __construct(FireNemoCollection $fireNemoCollection)
    {
        $this->fireNemoCollection = $fireNemoCollection;
    }

    public function handle()
    {
        (new FireNemoManager($this->fireNemoCollection))->send();
    }
}
