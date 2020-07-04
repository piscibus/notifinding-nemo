<?php


namespace Piscibus\Notifier\Tests\Firebase\Channels;

use Faker\Factory;
use Illuminate\Notifications\Notification;
use Piscibus\Notifier\Firebase\Channels\Contracts\FcmNotifiable;
use Piscibus\Notifier\Firebase\Channels\Contracts\FcmNotification;
use Piscibus\Notifier\Firebase\Channels\FcmChannel;
use Piscibus\Notifier\Firebase\Messages\Contracts\Message as MessageInterface;
use Piscibus\Notifier\Firebase\Messages\Message;

/**
 * Class ExampleNotification
 * @package Piscibus\Notifier\Tests\Channels
 */
class ExampleNotification extends Notification implements FcmNotification
{
    /**
     * @inheritDoc
     */
    public function toFcm(FcmNotifiable $notifiable): MessageInterface
    {
        $tokens = $notifiable->getFcmTokens();
        $data = ['foo' => 'bar'];
        $faker = Factory::create();
        $title = $faker->realText(30);
        $body = $faker->realText(60);

        return Message::init($tokens, $title, $body, $data);
    }

    /**
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $notifiable->preferesFcm() ? [FcmChannel::class] : ['mail'];
    }
}
