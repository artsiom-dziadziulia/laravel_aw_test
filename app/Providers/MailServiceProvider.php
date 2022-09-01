<?php

namespace App\Providers;

use App\Contracts\Mail\MailSenderContract;
use App\Services\User\Mail\SendService;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MailSenderContract::class, SendService::class);
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
