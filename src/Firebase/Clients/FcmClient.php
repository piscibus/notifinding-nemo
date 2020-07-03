<?php


namespace Piscibus\Notifier\Firebase\Clients;

use GuzzleHttp\Client;
use Piscibus\Notifier\Firebase\Payloads\Contracts\Payload;
use Psr\Http\Message\ResponseInterface;

/**
 * Class FcmClient
 * @package Piscibus\Notifier\Firebase\Clients
 */
class FcmClient
{
    const API_URI = 'https://fcm.googleapis.com/fcm/send';

    /**
     * @var Client
     */
    private $client;

    /**
     * FcmClient constructor.
     */
    public function __construct()
    {
        $headers = $this->getHeaders();
        $this->client = new Client(compact('headers'));
    }


    /**
     * @param Payload $message
     * @return ResponseInterface
     */
    public function send(Payload $message): ResponseInterface
    {
        return $this->client->post(self::API_URI, $message->toArray());
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        $key = config('notifier.firebase.key');

        return [
            'Authorization' => sprintf("key=%s", $key),
            'Content-Type' => 'application/json',
        ];
    }
}
