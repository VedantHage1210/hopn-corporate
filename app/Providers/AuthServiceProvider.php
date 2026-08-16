<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Super Admin and Admin always pass every permission/ability check,
        // regardless of the exact permission name involved. This avoids
        // 403s caused by permission-name mismatches between different
        // parts of the app (e.g. granular per-module permissions seeded
        // elsewhere vs. the simpler content.edit/content.delete/system.manage
        // tiers used for Editor/Publisher/Translator route gating) - the two
        // top roles are meant to have unconditional full access either way.
        Gate::before(function ($user, string $ability) {
            if (method_exists($user, 'hasRole') && $user->hasRole(['superadmin', 'admin'])) {
                return true;
            }
            return null;
        });
    }
}