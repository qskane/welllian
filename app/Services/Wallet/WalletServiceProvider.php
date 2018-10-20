<?php

namespace App\Services\Wallet;

use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('service.wallet', function ($app) {
            return $app->make(WalletService::class);
        });
    }
}
