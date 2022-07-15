<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use App\Http\Controllers\InternetServiceProviderController;
use App\Services\InternetServiceProvider\InternetServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->request->getRequestUri() == '/api/mpt/invoice-amount'){
            $this->app->bind(InternetServiceInterface::class, function () {
                return new Mpt();
            });
        };

        if($this->app->request->getRequestUri() == '/api/ooredoo/invoice-amount'){
            $this->app->bind(InternetServiceInterface::class, function () {
                return new Ooredoo();
            });
        };

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
