<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main\Ticket;

use App\Http\Requests\Main\TicketCreateRequest;
use App\Models\Ticket;

class CreateController extends BaseController
{

    public function index(TicketCreateRequest $request)
    {
        try {
            $this->saveTicketService->execute($request->validated(), auth()->user());
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('Houston we have a problem'));
        }

        return redirect()->back()->with('message', __('Ticket was added.'));
    }
}
