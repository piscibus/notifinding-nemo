<?php

namespace Piscibus\Notifier\Tests;

use Piscibus\Notifier\Collections\FireNemoCollection;

class ExampleTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
    
    public function testFireBase()
    {
        $user = new TestModel();
        $resource = new FireNemoCollection();
        $resource->priority('HIGH')
            ->data(['data' => 'data'])
            ->title('Hi Eslam')
            ->body('Hello From Notifinding-nemo')
            ->users($user);

        notifindingNemo()->addResource($resource)->send();
    }
}
