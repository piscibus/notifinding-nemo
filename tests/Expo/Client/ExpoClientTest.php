<?php

namespace Piscibus\Notifier\Tests\Firebase\Clients;

use Piscibus\Notifier\Expo\Clients\ExpoClient;
use Piscibus\Notifier\Expo\Messages\Message;
use Piscibus\Notifier\Tests\TestCase;


class ExpoClientTest extends TestCase
{
    const EXPO_TOKEN_1 = 'ExponentPushToken[bIW2NgPL6Vaqyrz8bsEvfC]';
    const EXPO_TOKEN_2 = 'ExponentPushToken[bIW2NgPL6Vaqyrz8bsEvfC]';


    public function test_it_returns_success_response_on_send()
    {
        $recipients = [self::EXPO_TOKEN_2, self::EXPO_TOKEN_2];
        $data = ['foo' => 'bar'];
        $message = Message::init($recipients, 'Nemo: Hello, world!', 'Hey, you forget to say Hello!', $data);
        $client = new ExpoClient();
        $response = $client->send($message);
        $this->assertEquals(200, $response->getStatusCode());
    }


    public function test_it_can_send_message_with_no_data()
    {
        $title = 'Watch the trailer';
        $body = 'You think Escobar was bad. Wait until you meet these guys';
        $recipients = [self::EXPO_TOKEN_2, self::EXPO_TOKEN_2];

        $message = Message::init($recipients, $title, $body);

        $client = new ExpoClient();
        $response = $client->send($message);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
