<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class ApiAuthenticate extends Middleware
{

    public function authenticate($request, array $guards): void
    {
        $apiToken = $request->query('api_token');

        if(empty($apiToken)) {
            $apiToken = $request->input('api_token');
        }

        if(empty($apiToken)) {
            $apiToken = $request->bearerToken();
        }

        $user = User::firstWhere('token', $apiToken);
        if($user) {
            return;
        }

       $this->unauthenticated($request, $guards);
    }
}
