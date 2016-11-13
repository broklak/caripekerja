<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\View;

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

        View::composer('*', function($view){

            $this->getAuthData();

        });


    }

    protected function getAuthData () {
        $authData = $this->checkAuthRole();

        View::share('isLogged', $authData['isLogged']);
        View::share('authUser', $authData['authData']);
    }

    private function checkAuthRole () {
        $worker = Auth::user();
        $employer = Auth::guard('employer')->user();

        if($worker || $employer) {
            return array(
                'isLogged'  => true,
                'authData'  => ($worker) ? $worker : $employer
            );
        }

        return array(
            'isLogged'  => false,
            'authData'  => null
        );
    }
}
