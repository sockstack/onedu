<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\impl\UserServiceImpl;
use App\Services\IUserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        //
        $this->app->bind(IUserService::class, function ($app) {
            return new UserServiceImpl(new UserRepository(new User()));
        });
    }
}
