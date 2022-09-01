<?php

declare(strict_types=1);

namespace App\Http\Resources\Main;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

class CreateTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        $data[0] = $this->attributesToArray();
        foreach ($this->messages as $message) {
            $data[0]['messages'][0] = $message;
            foreach ($message->serverCredentials as $credential) {
                $credential->ftp_password = Crypt::decryptString($credential->ftp_password);
            }
        }

        return [
            'Message' => 'Success',
            $data,
        ];
    }
}
