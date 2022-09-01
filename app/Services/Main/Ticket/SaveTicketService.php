<?php

declare(strict_types=1);

namespace App\Services\Main\Ticket;

use App\Models\Message;
use App\Models\ServerCredentials;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class SaveTicketService
{
    private GetNextTicketUidService $getNextTicketUidService;

    public function __construct(GetNextTicketUidService $getNextTicketUidService)
    {
        $this->getNextTicketUidService = $getNextTicketUidService;
    }

    public function execute(array $data, User $user): Ticket
    {
        $generatedUid = $this->getNextTicketUidService->execute();
        $ticketData = [
            'uid' => $generatedUid,
            'subject' => $data['subject'],
            'user_name' => $user->name,
            'user_email' => $user->email,
        ];
        $ticket = Ticket::create($ticketData);

        $messageData = [
            'author' => $data['author'],
            'content' => $data['content'],
            'ticket_id' => $ticket->id,
            'user_id' => $user->id,
        ];
        $message = Message::create($messageData);

        if(!empty($data['ftp_credentials'])) {
            $credentials = [];
            foreach ($data['ftp_credentials']['login'] as $key => $credential) {
                if ($credential) {
                    $insertedArray['ftp_login'] = $credential;
                    $insertedArray['ftp_password'] = Crypt::encryptString($data['ftp_credentials']['password'][$key]);
                    $insertedArray['message_id'] = $message->id;

                    $credentials[] = $insertedArray;
                }
            }
            foreach ($credentials as $credential) {
                ServerCredentials::create($credential);
            }
        }

        return $ticket;
    }
}
