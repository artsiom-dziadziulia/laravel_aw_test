<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main\Ticket\Api;

use App\Http\Requests\Main\TicketCreateRequest;
use App\Http\Resources\Main\CreateTicketResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\UnauthorizedException;

class CreateController extends BaseController
{
    public function store(TicketCreateRequest $request)
    {
        $data = $request->validated();
        $user = User::firstWhere('token', $data['api_token']);
        $ticket = $this->saveTicketService->execute($data, $user);

        return new CreateTicketResource($ticket);
    }
}
