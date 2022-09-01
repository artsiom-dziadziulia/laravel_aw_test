<?php

namespace App\Services\Main\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class GetTicketNextDbIdService
{
    public function execute(): int
    {
        $ticket = Ticket::latest()->first();

        if (!$ticket) {
            $lastId = 0;
        } else {
            $lastId = $ticket->id++;
        }

        return $lastId;
    }
}
