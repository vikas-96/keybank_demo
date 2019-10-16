<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
//use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Auth;
use App\Extensions\CTokenGuard;
use App\Extensions\CTokenUserProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*** Custom Auth ***/
        Auth::provider('c_eloquent', function ($app, array $config) {
            return new CTokenUserProvider($app['hash'], $config['model'], config('cauth'));
        });

        Auth::extend('ctoken', function ($app, $name, array $config) {

            $guard = new CTokenGuard(Auth::createUserProvider(
                $config['provider']),
                $app['request'],
                config('cauth'));

            $app->refresh('request', $guard, 'setRequest');

            return $guard;
        });
        /*** .../Custom Auth ***/
    }
}
