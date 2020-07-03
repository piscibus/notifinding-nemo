<?php

namespace Piscibus\Notifier\Tests\Firebase\Messages;

use Faker\Factory;
use Faker\Generator;
use Piscibus\Notifier\Firebase\Messages\Message;
use Piscibus\Notifier\Firebase\Messages\Notification;
use Piscibus\Notifier\Firebase\Messages\Payload;
use Piscibus\Notifier\Tests\TestCase;

/**
 * Class MessageTest
 * @package Piscibus\Notifier\Tests\Firebase\Messages
 */
class MessageTest extends TestCase
{
    /**
     * @var Generator
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
    public function test_it_can_be_converted_into_array()
    {
        $title = $this->faker->realText(30);
        $body = $this->faker->realText(60);

        $notification = Notification::init($title, $body);
        $data = ['phone' => $this->faker->phoneNumber];

        $recipients = [$this->faker->unique()->uuid, $this->faker->unique()->uuid];
        $payload = new Payload($data, $notification);

        $message = new Message($recipients, $payload);

        $expected = [
            'registration_ids' => $recipients,
            'priority' => Message::PRIORITY_DEFAULT,
            'data' => $data,
            'notification' => $notification->toArray(),
        ];
        $actual = $message->toArray();

        $this->assertEquals($actual, $expected);
    }
}
