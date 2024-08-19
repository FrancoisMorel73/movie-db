<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Review;
use App\Policies\ReviewPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * map the policies.
     *
     * @var array
     */
    protected $policies = [
        Review::class => ReviewPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
