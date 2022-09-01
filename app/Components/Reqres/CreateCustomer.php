<?php

namespace App\Components\Reqres;

use App\Contracts\Reqres\ClientApiContract;
use Psr\Http\Message\ResponseInterface;

class CreateCustomer extends ClientApi implements ClientApiContract
{
    public function createCustomer(array $data): ResponseInterface
    {
        $this->setUri(self::CREATE_CUSTOMER_URI);
        $this->setData($data);
        $this->setMethod(self::POST_METHOD);

        return $this->sendRequest();
    }
}
