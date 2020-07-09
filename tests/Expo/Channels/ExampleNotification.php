<?php


namespace Piscibus\Notifier\Tests\Expo\Channels;

use Faker\Factory;
use Illuminate\Notifications\Notification;
use Piscibus\Notifier\Expo\Channels\Contracts\ExpoNotifiable;
use Piscibus\Notifier\Expo\Channels\Contracts\ExpoNotification;
use Piscibus\Notifier\Expo\Channels\ExpoChannel;
use Piscibus\Notifier\Expo\Messages\Contracts\Message as MessageInterface;
use Piscibus\Notifier\Expo\Messages\Message;

class ExampleNotification extends Notification implements ExpoNotification
{
    /**
     * @param ExpoNotifiable $notifiable
     * @return MessageInterface
     */
    public function toExpo(ExpoNotifiable $notifiable): MessageInterface
    {
        $tokens = $notifiable->getExpoTokens();
        $data = ['foo' => 'bar'];
        $faker = Factory::create();
        $title = $faker->realText(20);
        $body = $faker->realText(60);

        return Message::init($tokens, $title, $body, $data);
    }


    /**
     * @param $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return count($notifiable->getExpoTokens()) > 0 ? [ExpoChannel::class] : ['db'];
    }
}
