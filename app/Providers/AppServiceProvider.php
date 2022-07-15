<?php

namespace App\Providers;

use App\Http\Services\MptService;
use App\Http\Services\OoredooService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Services\InternetServiceInterface;
use App\Http\Controllers\InternetServiceProviderController;

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
                return new MptService();
            });
        };

        if($this->app->request->getRequestUri() == '/api/ooredoo/invoice-amount'){
            $this->app->bind(InternetServiceInterface::class, function () {
                return new OoredooService();
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
