<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class IndexController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.ticket.index', compact('tickets'));
    }
}
