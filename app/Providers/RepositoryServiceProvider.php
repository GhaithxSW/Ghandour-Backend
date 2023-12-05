<?php

namespace App\Providers;

use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\OrderRepositoryImpl;
use App\Http\Repositories\ResearchRepository;
use App\Http\Repositories\ResearchRepositoryImpl;
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
