<?php

namespace App\Services\Main\Ticket;

use Illuminate\Support\Facades\DB;

class GetNextTicketUidService
{
    private GetTicketNextDbIdService $getTicketNextDbId;

    public function __construct(GetTicketNextDbIdService $getTicketNextDbId)
    {
        $this->getTicketNextDbId = $getTicketNextDbId;
    }

    const GENERATED_UID_PREFIX = 'HTX-';

    public function execute(): string
    {
        return self::GENERATED_UID_PREFIX . $this->getTicketNextDbId->execute();
    }
}
