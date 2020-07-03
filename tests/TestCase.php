<?php

namespace Piscibus\Notifier\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Piscibus\Notifier\NotifindingNemoServiceProvider;

class TestCase extends Orchestra
{
    const SERVER_KEY = 'AAAA-C1CvXU:APA91bH0FQSmWTyHVJsQTTrAmZqPjk6v9HqTHBr1t-QG8G89SmLJC4xNYaUWQS5xHCDNeoC7TNngTDDUJPST8L97Tpi_xoabuKTnV91fIlb9qJKWb-xf7T-Eu75jkeR66uyKV8GRkcxm';

    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            NotifindingNemoServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('notifier.firebase.key', self::SERVER_KEY);
    }
}
