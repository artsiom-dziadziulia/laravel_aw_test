<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class IndexController extends Controller
{
    public function index()
    {
        $count = Ticket::all()->count();
        return view('admin.main.index', compact('count'));
    }
}
