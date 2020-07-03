<?php


namespace Piscibus\Notifier\Firebase\Clients;

use GuzzleHttp\Client;
use Piscibus\Notifier\Firebase\Messages\Contracts\Message as MessageInterface;
use Piscibus\Notifier\Firebase\Messages\Message;
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
     * @param array $recipients
     * @param string $title
     * @param string $body
     * @param array $data
     * @return ResponseInterface
     */
    public static function sendMessage(
        array $recipients,
        string $title,
        string $body,
        array $data = []
    ): ResponseInterface {
        $client = new self();

        return $client->send(Message::init($recipients, $title, $body, $data));
    }


    /**
     * @param MessageInterface $message
     * @return ResponseInterface
     */
    public function send(MessageInterface $message): ResponseInterface
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
