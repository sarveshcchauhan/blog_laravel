<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Posts CRUD Permissions
        Gate::resource('posts','App\Policies\PostPolicy');

        //Tag  Permission
        Gate::define('posts.tag','App\Policies\PostPolicy@tag');

        //Category Permission
        Gate::define('posts.category','App\Policies\PostPolicy@category');

        //User CRUD Permission
        Gate::resource('users','App\Policies\UserPolicy');
    }
}
