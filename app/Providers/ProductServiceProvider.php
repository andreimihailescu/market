<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
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
//		$this->app->bind('App\Providers\ProductServiceInterface', 'App\Product');
		$this->app->bind('App\Providers\ProductServiceInterface', 'App\Mocks\ProductMock');
    }
}
