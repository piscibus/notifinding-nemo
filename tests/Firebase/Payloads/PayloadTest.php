<?php

namespace Piscibus\Notifier\Tests\Firebase\Payloads;

use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Piscibus\Notifier\Firebase\Payloads\Payload;
use Piscibus\Notifier\Tests\TestCase;

/**
 * Class PayloadTest
 * @package Piscibus\Notifier\Tests\Firebase\Messages
 */
class PayloadTest extends TestCase
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
        $body_loc_key = Str::slug($this->faker->text(10));
        $android_channel_id = 'nemo.channel';

        $notification = new Payload();
        $notification->setTitle($title)
            ->setBody($body)
            ->setBodyLocKey($body_loc_key)
            ->setAndroidChannelId($android_channel_id);

        $expected = compact('title', 'body', 'body_loc_key', 'android_channel_id');
        $this->assertEquals($expected, $notification->toArray());
    }
}
