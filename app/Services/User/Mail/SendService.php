<?php

declare(strict_types=1);

namespace App\Services\User\Mail;

use App\Contracts\Mail\MailSenderContract;
use Illuminate\Support\Facades\Mail;

class SendService implements MailSenderContract
{
    public function execute($data)
    {
        Mail::to($data['to'])->send($data['sender']);
    }
}
