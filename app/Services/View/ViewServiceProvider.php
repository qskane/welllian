<?php

namespace App\Services\View;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('service.view', function ($app) {
            return $app->make(ViewService::class);
        });
    }
}
