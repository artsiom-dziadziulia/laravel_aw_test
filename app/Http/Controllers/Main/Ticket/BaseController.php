<?php

namespace App\Http\Controllers\Main\Ticket;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Main\Ticket\SaveTicketService;

class BaseController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public SaveTicketService $saveTicketService;

    public function __construct(SaveTicketService $saveTicketService)
    {
        $this->middleware('auth');
        $this->saveTicketService = $saveTicketService;
    }
}
