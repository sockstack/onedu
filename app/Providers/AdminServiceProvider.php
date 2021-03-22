<?php

namespace App\Providers;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use App\Services\impl\AdminServiceImpl;
use App\Services\IAdminService;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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
        $this->app->bind(IAdminService::class, function ($app) {
            return new AdminServiceImpl(new AdminRepository(new Admin()));
        });
    }
}
