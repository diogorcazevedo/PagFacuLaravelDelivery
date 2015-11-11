<?php

namespace pagfacu\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'pagfacu\Repositories\CategoryRepository',
            'pagfacu\Repositories\CategoryRepositoryEloquent'
        );

        $this->app->bind(
            'pagfacu\Repositories\ProductRepository',
            'pagfacu\Repositories\ProductRepositoryEloquent'
        );
        $this->app->bind(
            'pagfacu\Repositories\ClientRepository',
            'pagfacu\Repositories\ClientRepositoryEloquent'
        );

        $this->app->bind(
            'pagfacu\Repositories\UserRepository',
            'pagfacu\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'pagfacu\Repositories\OrderRepository',
            'pagfacu\Repositories\OrderRepositoryEloquent'
        );

        $this->app->bind(
            'pagfacu\Repositories\CupomRepository',
            'pagfacu\Repositories\CupomRepositoryEloquent'
        );
    }
}
