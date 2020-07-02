<?php

namespace Piscibus\Notifier\Tests;

use Illuminate\Database\Eloquent\Model;
use Piscibus\Notifier\Traits\NotifindingNemo;

class TestModel extends Model
{
    use NotifindingNemo;

    public function firePushTokens(): array
    {
        return [
            'f-cZPpHxQTCBjl0_KGB67m:APA91bHiFrgvhJblxdvlYxaObQon7yLTABT4i5Hv3a1KPo3FEMUxWGpJowXsG7itlK2WNJQNHCK7QlKOxW5A4b2ia3idfCrcy5er6tRizy8X_0IIVzjurHwp6nJzNWdH5x5G8pIzfeY5',
            'eULGKvdTT2OsrSHOw01si_:APA91bE3cEodWlt5a6lF9H6yVKbzgz2IdO55RSD5NUiXydCpPn9vRypfUdN25XA-9hGpIi8V4JAQ6dob9J_YogMhzmCx_nKyloW6QPqyNRzqHUAGdAVkhxxfmRZUkakW3H-p0KSv9nqj',
        ];
    }
}
