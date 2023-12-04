<?php

namespace App\Providers;

use App\Http\Repositories\ResearchRepository;
use App\Http\Repositories\ResearchRepositoryImpl;
use App\Http\Repositories\ResearchRequestRepository;
use App\Http\Repositories\ResearchRequestRepositoryImpl;
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
        $this->app->bind(ResearchRequestRepository::class, ResearchRequestRepositoryImpl::class);
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
