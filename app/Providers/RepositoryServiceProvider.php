<?php

namespace App\Providers;

use App\Http\Repositories\AdminRepository;
use App\Http\Repositories\AdminRepositoryImpl;
use App\Http\Repositories\EducationLevelRepository;
use App\Http\Repositories\EducationLevelRepositoryImpl;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\OrderRepositoryImpl;
use App\Http\Repositories\ResearchRepository;
use App\Http\Repositories\ResearchRepositoryImpl;
use App\Http\Repositories\TeamRepository;
use App\Http\Repositories\TeamRepositoryImpl;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepository::class, OrderRepositoryImpl::class);
        $this->app->bind(ResearchRepository::class, ResearchRepositoryImpl::class);
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(AdminRepository::class, AdminRepositoryImpl::class);
        $this->app->bind(EducationLevelRepository::class, EducationLevelRepositoryImpl::class);
        $this->app->bind(TeamRepository::class, TeamRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
