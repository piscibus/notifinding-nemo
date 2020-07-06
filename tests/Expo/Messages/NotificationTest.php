<?php

namespace Piscibus\Notifier\Tests\Expo\Messages;

use Faker\Factory;
use Faker\Generator as Faker;
use Piscibus\Notifier\Expo\Messages\Notification;
use Piscibus\Notifier\Tests\TestCase;

/**
 * Class NotificationTest
 * @package Piscibus\Notifier\Tests\Firebase\Messages
 */
class NotificationTest extends TestCase
{
    /**
     * @var Faker
     */
    private $faker;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }

    /**
     * @test
     */
    public function test_it_converts_data_to_array()
    {
        $title = $this->faker->realText(30);
        $body = $this->faker->realText(60);

        // Android Attribute
        $channelId = 'channelId';

        // IOS Attribute
        $sound = 'default';
        $subtitle = $this->faker->realText(10);

        $notification = new Notification();

        $notification->setTitle($title)
            ->setBody($body)
            ->setChannelId($channelId)
            ->setSound($sound)
            ->setSubTitle($subtitle);

        $expected = compact('title', 'body', 'channelId', 'subtitle', 'sound');


        $this->assertEquals($expected, $notification->toArray());
    }
}
