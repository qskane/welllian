<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\Scheme;
use App\Models\User;
use App\Models\Wallet;
use App\Policies\MediaPolicy;
use App\Policies\SchemePolicy;
use App\Policies\UserPolicy;
use App\Policies\WalletPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Media::class => MediaPolicy::class,
        Wallet::class => WalletPolicy::class,
        Scheme::class => SchemePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
