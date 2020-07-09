<?php


namespace Piscibus\Notifier\Firebase\Clients;

use GuzzleHttp\Client;
use Piscibus\Notifier\Firebase\Messages\Contracts\Message as MessageInterface;
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
     * @var string
     */
    private $key;

    /**
     * FcmClient constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
        $headers = $this->getHeaders();
        $this->client = new Client(compact('headers'));
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        return [
            'Authorization' => sprintf("key=%s", $this->key),
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @param MessageInterface $message
     * @return ResponseInterface
     */
    public function send(MessageInterface $message): ResponseInterface
    {
        return $this->client->post(self::API_URI, [
            'form_params' => $message->toArray(),
        ]);
    }
}
