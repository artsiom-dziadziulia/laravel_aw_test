<?php

namespace App\Http\Controllers\Main\Ticket\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Main\Ticket\SaveTicketService;

class BaseController extends Controller
{
    public SaveTicketService $saveTicketService;

    public function __construct(SaveTicketService $saveTicketService)
    {
        $this->middleware('auth_api');
        $this->saveTicketService = $saveTicketService;
    }
}
