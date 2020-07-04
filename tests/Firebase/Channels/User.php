<?php


namespace Piscibus\Notifier\Tests\Firebase\Channels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Piscibus\Notifier\Firebase\Channels\Contracts\FcmNotifiable;

class User extends Model implements FcmNotifiable
{
    use Notifiable;

    const FCM_TOKEN = 'd0GP7vCZRy6t_XmN-VUdPF:APA91bG4qUKPGQYoHdxVsuWzVV-V3DCMzYTmD3rH-JuGnIakXmcHsJ2BNHDq_VGVOKcWt3MqEmcSUTlmOKcWHee-GptMfQr1q0YxNmYPKek1sqehnkyMGR9WLsgGfhtZnSXG8uD4_xfH';

    /**
     * @return array
     */
    public function getFcmTokens(): array
    {
        return [self::FCM_TOKEN];
    }

    /**
     * @return bool
     */
    public function preferesFcm(): bool
    {
        return true;
    }
}
