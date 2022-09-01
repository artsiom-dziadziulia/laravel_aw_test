<?php

declare(strict_types=1);

namespace App\Components\Reqres;

use App\Contracts\Reqres\ClientApiContract;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class ClientApi implements ClientApiContract
{
    const BASE_URI = 'https://reqres.in/';
    const CREATE_CUSTOMER_URI = 'api/users';
    const POST_METHOD = 'POST';

    public Client $client;

    private string $uri;

    private array $data;

    private string $method;

    public function setUri(string $uri): ClientApiContract
    {
        $this->uri = $uri;

        return $this;
    }

    public function setData(array $data): ClientApiContract
    {
        $this->data = $data;

        return $this;
    }

    public function setMethod(string $method): ClientApiContract
    {
        $this->method = $method;

        return $this;
    }

    public function sendRequest(): ResponseInterface
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
            'timeout' => 2.0,
        ]);

        return $this->client->request($this->method, $this->uri, ['json' => $this->data]);
    }

}
