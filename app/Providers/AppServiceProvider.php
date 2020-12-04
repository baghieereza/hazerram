<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $gate->define('isTeacher', function ($user) {
            return $user->role == 'teacher';
        });
        $gate->define('isStudent', function ($user) {
            return $user->role == 'student';
        });
        $gate->define('isManager', function ($user) {
            return $user->role == 'manager';
        });
        $gate->define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });

    }
}
