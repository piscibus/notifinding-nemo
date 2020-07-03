<?php

namespace Piscibus\Notifier\Tests\Firebase\Messages;

use Piscibus\Notifier\Firebase\Messages\Payload;
use Piscibus\Notifier\Tests\TestCase;

class PayloadTest extends TestCase
{
    /**
     * @test
     */
    public function test_it_may_be_constructed_with_title_and_body()
    {
        $title = 'Watch the trailer';
        $body = 'You think Escobar was bad. Wait until you meet these guys';

        $payload = Payload::init($title, $body);
        $this->assertInstanceOf(Payload::class, $payload);
    }
}
