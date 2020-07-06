<?php

namespace Piscibus\Notifier\Tests\Expo\Messages;

use Faker\Factory;
use Illuminate\Support\Arr;
use Piscibus\Notifier\Expo\Messages\Message;
use Piscibus\Notifier\Expo\Messages\Notification;
use Piscibus\Notifier\Tests\TestCase;

class MessageTest extends TestCase
{
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

        $recipients = [$this->faker->unique()->uuid, $this->faker->unique()->uuid];
        $data = ['Foo' => 'bar'];
        $notification = Notification::init($title, $body, $data);

        $priority = [
            Message::PRIORITY_HIGH,
            Message::PRIORITY_DEFAULT,
            Message::PRIORITY_NORMAL,
        ];

        $priority = Arr::random($priority);

        $message = new Message($recipients, $notification, $priority);

        $expectedBody = [
            'to' => $recipients,
            'data' => json_encode($data),
            'title' => $title,
            'body' => $body,
            'priority' => $priority,
        ];
        $expected = $expectedBody;
        $actual = $message->toArray();
        $this->assertEquals($actual, $expected);
    }



    public function test_it_can_be_created_by_title_and_body()
    {
        $title = $this->faker->realText(30);
        $body = $this->faker->realText(60);
        $recipients = [$this->faker->unique()->uuid, $this->faker->unique()->uuid];

        $message = Message::init($recipients, $title, $body);
        $this->assertInstanceOf(Message::class, $message);
    }
}
