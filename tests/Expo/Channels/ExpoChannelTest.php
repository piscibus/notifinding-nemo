<?php

namespace Piscibus\Notifier\Tests\Expo\Channels;

use Illuminate\Support\Facades\Notification;
use Piscibus\Notifier\Tests\TestCase;


class ExpoChannelTest extends TestCase
{
    /**
     * @test
     */
    public function test_it_can_be_sent_using_laravel_notifiable_trait()
    {
        Notification::fake();
        $user = new User();
        $user->notify(new ExampleNotification());
        Notification::assertSentTo([$user], ExampleNotification::class);
    }

    /**
     * @test
     */
    public function test_it_can_be_sent_using_laravel_notification_facade()
    {
        Notification::fake();
        $user1 = new User();
        $user2 = new User();
        $users = [$user1, $user2];

        Notification::send($users, new ExampleNotification());
        Notification::assertSentTo($users, ExampleNotification::class);
    }
}
