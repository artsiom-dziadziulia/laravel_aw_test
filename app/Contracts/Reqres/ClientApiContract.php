<?php
declare(strict_types=1);

namespace App\Contracts\Reqres;

use Psr\Http\Message\ResponseInterface;

interface ClientApiContract
{
    public function setUri(string $uri): ClientApiContract;

    public function setData(array $data): ClientApiContract;

    public function setMethod(string $method): ClientApiContract;

    public function sendRequest(): ResponseInterface;
}
