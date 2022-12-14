<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-admin', function(User $user){
            return $user->admin;  
        });

        Gate::define('admin', function(User $user){
            return $user->est_admin;
        });

        Gate::define('chauffeur', function(User $user){
            if($user->est_admin === 0){
                return true;
            } 
            return false;
        });
    }
    
}
