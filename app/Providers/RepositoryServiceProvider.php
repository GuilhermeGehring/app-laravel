<?php

namespace App\Providers;

use App\Repositories\Core\QueryBuilder\QueryBuilderClientRepository;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\ClientRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ClientRepositoryInterface::class,
            QueryBuilderClientRepository::class
        );
    }
}
