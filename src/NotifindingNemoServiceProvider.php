<?php

namespace Piscibus\Notifier;

use Illuminate\Support\ServiceProvider;

class NotifindingNemoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/notifier.php' => config_path('notifier.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/notifier.php', 'notifier');

        $this->app->bind('notifier', function () {
            return new Notifier();
        });
    }
}
