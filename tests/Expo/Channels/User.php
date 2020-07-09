<?php


namespace Piscibus\Notifier\Tests\Expo\Channels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Piscibus\Notifier\Expo\Channels\Contracts\ExpoNotifiable;

class User extends Model implements ExpoNotifiable
{
    use Notifiable;

    const EXPO_TOKEN_1 = 'ExponentPushToken[QKjSZkDEHfwWyE_1zVqXlf]';
    const EXPO_TOKEN_2 = 'ExponentPushToken[QKjSZkDEHfwWyE_1zVqXlf]';

    /*
     * Get Expo Tokens
     *
     * @return array
     * */
    public function getExpoTokens(): array
    {
        return [Arr::random([self::EXPO_TOKEN_1, self::EXPO_TOKEN_2])];
    }

}
