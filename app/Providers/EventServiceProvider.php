<?php

namespace App\Providers;

use App\Events\MediaSaved;
use App\Events\WalletCoinUpdated;
use App\Listeners\MediaConsumableListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        WalletCoinUpdated::class => [
            MediaConsumableListener::class,
        ],
        MediaSaved::class => [
            MediaConsumableListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
