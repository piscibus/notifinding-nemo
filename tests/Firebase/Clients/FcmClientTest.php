<?php

namespace Piscibus\Notifier\Tests\Firebase\Clients;

use Piscibus\Notifier\Firebase\Clients\FcmClient;
use Piscibus\Notifier\Firebase\Messages\Message;
use Piscibus\Notifier\Firebase\Messages\Notification;
use Piscibus\Notifier\Firebase\Messages\Payload;
use Piscibus\Notifier\Tests\TestCase;

/**
 * Class FcmClientTest
 * @package Piscibus\Notifier\Tests\Firebase\Clients
 */
class FcmClientTest extends TestCase
{
    const FCM_TOKEN_1 = 'd0GP7vCZRy6t_XmN-VUdPF:APA91bG4qUKPGQYoHdxVsuWzVV-V3DCMzYTmD3rH-JuGnIakXmcHsJ2BNHDq_VGVOKcWt3MqEmcSUTlmOKcWHee-GptMfQr1q0YxNmYPKek1sqehnkyMGR9WLsgGfhtZnSXG8uD4_xfH';
    const FCM_TOKEN_2 = 'cEmJw_xmSNqapY7Gb2gmUb:APA91bHAc2PwvDDLNZsSyABzOXUJopbw2cmsbCKiJa97iPXeCxXDSgebTTCIMk017wQa6RV5eobyqlHL0WCoWZhQAIYLyjoG7dA_wv78mxOazFF0f4zJbnL-Kc97ddxC-5ie-MpVjIUP';

    /**
     * @test
     */
    public function test_it_returns_success_response_on_send()
    {
        $notification = Notification::init('Nemo: Hello, world!', 'Hey, you forget to say Hello!');
        $data = ['foo' => 'bar'];
        $recipients = [self::FCM_TOKEN_1, self::FCM_TOKEN_2];
        $message = new Message($recipients, new Payload($notification, $data));

        $key = config('notifier.firebase.key');
        $client = new FcmClient($key);
        $response = $client->send($message);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function test_it_can_send_message_with_no_data()
    {
        $title = 'Watch the trailer';
        $body = 'You think Escobar was bad. Wait until you meet these guys';
        $recipients = [self::FCM_TOKEN_1, self::FCM_TOKEN_2];

        $message = Message::init($recipients, $title, $body);

        $key = config('notifier.firebase.key');
        $client = new FcmClient($key);
        $response = $client->send($message);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
