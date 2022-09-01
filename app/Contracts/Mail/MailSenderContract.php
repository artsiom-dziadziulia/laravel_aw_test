<?php

namespace App\Contracts\Mail;

interface MailSenderContract
{
    public function execute(array $data);
}
