<?php


namespace Piscibus\Notifier\Expo\Clients;

use GuzzleHttp\Client;
use Piscibus\Notifier\Expo\Messages\Contracts\Message as MessageInterface;
use Psr\Http\Message\ResponseInterface;

class ExpoClient
{
    const API_URI = 'https://exp.host/--/api/v2/push/send';
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
            'base_uri' => self::API_URI,
        ];
    }


    /**
     * @param MessageInterface $messageInterface
     * @return ResponseInterface
     */
    public function send(MessageInterface $messageInterface): ResponseInterface
    {
        return $this->client->post('', ['form_params' => $messageInterface->toArray()]);
    }
}
