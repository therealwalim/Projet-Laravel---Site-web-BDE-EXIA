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

        Gate::define('isSpecial' , function($user){
            if( $user->type_user == 3 || $user->type_user == 2){
                    return true;
                }
                return false;  });

        Gate::define('isAdmin' , function($user){ 
        if( $user->type_user == 3){
                return true;
            }
            return false;  });
            
            Gate::define('isBde' , function($user){ 
                if( $user->type_user == 2){
                        return true;
                    }

                    return false;  });
                    Gate::define('isStudent' , function($user){ 
                        if( $user->type_user == 1){
                                return true;
                            }
                            return false;  });
        
        //
    }
}
