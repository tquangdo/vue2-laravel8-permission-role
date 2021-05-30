<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::get()->map(function ($permission) {
            // FROM "$user->hasPermission('create-tasks')" TO "$user->can('create-tasks')"
            Gate::define($permission->slug, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        });
    }
}
