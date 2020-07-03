<?php

namespace Piscibus\Notifier\Tests\Firebase\Payloads;

use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Piscibus\Notifier\Firebase\Payloads\AndroidPayload;
use Piscibus\Notifier\Tests\TestCase;

/**
 * Class AndroidPayloadTest
 * @package Piscibus\Notifier\Tests\Firebase\Messages
 */
class AndroidPayloadTest extends TestCase
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

        $notification = new AndroidPayload();
        $notification->setTitle($title)->setBody($body)->setBodyLocKey($body_loc_key);

        $expected = compact('title', 'body', 'body_loc_key');
        $this->assertEquals($expected, $notification->toArray());
    }
}
