<?php


namespace Piscibus\Notifier\Expo\Clients;

use GuzzleHttp\Client;
use Piscibus\Notifier\Expo\Messages\Contracts\Message;
use Psr\Http\Message\ResponseInterface;

class ExpoClient
{
    const API_URI = 'https://exp.host/--/api/v2/push/send';

    /**
     * @var Client
     */
    private $client;

    /**
     * ExpoClient constructor.
     */
    public function __construct()
    {
        $header = $this->getHeaders();
        $this->client = new Client($header);
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }


    /**
     * @param Message $message
     * @return ResponseInterface
     */
    public function send(Message $message): ResponseInterface
    {
        return $this->client->post(self::API_URI, [
            'form_params' => $message->toArray(),
        ]);
    }
}
