<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PersonRepository::class, \App\Repositories\PersonRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SearchRepository::class, \App\Repositories\SearchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AnalysisResultRepository::class, \App\Repositories\AnalysisResultRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PeopleDataRepository::class, \App\Repositories\PeopleDataRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PeopleInssRepositoryEloquent::class ,\App\Repositories\PeopleInssRepositoryEloquent::class);

    }
}
