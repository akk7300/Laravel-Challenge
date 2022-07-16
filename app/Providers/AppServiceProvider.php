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
        switch ($this->app->request->type) {

            case 'mpt':
                $this->app->bind(InternetServiceInterface::class, function () {
                    return new Mpt();
                });
              break;

            case 'ooredoo':
                $this->app->bind(InternetServiceInterface::class, function () {
                    return new Ooredoo();
                });
              break;
              
            default:
                $this->app->bind(InternetServiceInterface::class, function () {
                    return new Mpt();
                });
        }
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
