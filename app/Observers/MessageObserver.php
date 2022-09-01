<?php

declare(strict_types=1);

namespace App\Observers;

use App\Contracts\Mail\MailSenderContract;
use App\Contracts\Reqres\ClientApiContract;
use App\Mail\User\TicketMail;
use App\Models\Message;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MessageObserver
{
    private MailSenderContract $mailSender;
    private ClientApiContract $apiContract;

    public function __construct(MailSenderContract $mailSender, ClientApiContract $apiContract)
    {
        $this->mailSender = $mailSender;
        $this->apiContract = $apiContract;
    }

    /**
     * Handle the Message "created" event.
     *
     * @param  \App\Models\Message $message
     * @return void
     */
    public function created(Message $message): void
    {
        $ticket = $message->ticket;
        $user = User::find($message->user_id);

        $data = [
            'to' => $user->email,
            'variables' => [
                'ticket' => $ticket
            ]
        ];
        $data['sender'] = new TicketMail($data['variables']);
        $this->mailSender->execute($data);
        $response = $this->apiContract->createCustomer(['name' => $user->name]);
        Log::info($response->getBody()->getContents());

    }

    /**
     * Handle the Message "updated" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function updated(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function deleted(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function restored(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function forceDeleted(Ticket $ticket)
    {
        //
    }
}
