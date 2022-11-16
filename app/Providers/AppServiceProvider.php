<?php

namespace App\Providers;

use App\Service\Auth\AuthService;
use App\Service\Auth\AuthServiceInterface;
use App\Service\BaseResponse\BaseResponseService;
use App\Service\BaseResponse\BaseResponseServiceInterface;
use App\Service\Product\ProductService;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseResponseServiceInterface::class, BaseResponseService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
