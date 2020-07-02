<?php

namespace Piscibus\Notifier\FireNemo;

use GuzzleHttp\Client;
use Piscibus\Notifier\Collections\FireNemoCollection;

class FireNemoManager
{
    /**
     * @const The API URL for Firebase
     */
    const API_URI = 'https://fcm.googleapis.com/fcm/send';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    private $data;

    private $fireNemoCollection;

    /**
     * FireNemoManager constructor.
     * @param FireNemoCollection $fireNemoCollection
     */
    public function __construct(FireNemoCollection $fireNemoCollection)
    {
        $this->fireNemoCollection = $fireNemoCollection;
        $this->apiKey = config('notifier.firebase.key');
        $this->client = new Client([
            'base_uri' => self::API_URI,
            'headers' => [
                'Authorization' => 'key=' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);
        $this->setData();
    }

    public function send()
    {
        $this->client->post('', [
            'body' => $this->getData(),
        ]);
    }

    protected function getData()
    {
        return $this->data;
    }

    public function setData()
    {
        $payload = [
            'priority' => $this->fireNemoCollection->priority,
        ];

        $payload['registration_ids'] = $this->fireNemoCollection->users;

        if (isset($this->fireNemoCollection->data) && count($this->fireNemoCollection->data)) {
            $payload['data'] = $this->fireNemoCollection->data;
        }

        if (isset($this->fireNemoCollection->notification) && count($this->fireNemoCollection->notification)) {
            $payload['notification'] = $this->fireNemoCollection->notification;
        }

        $this->data = \GuzzleHttp\json_encode($payload);
    }
}
