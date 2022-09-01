<?php

namespace App\Providers;

use App\Components\Reqres\CreateCustomer;
use App\Contracts\Reqres\ClientApiContract;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientApiContract::class, CreateCustomer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
