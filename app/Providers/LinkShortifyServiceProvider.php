<?php

namespace App\Providers;

use App\Services\LinkShortifyService;
use Illuminate\Support\ServiceProvider;

class LinkShortifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LinkShortifyService::class, function ($app) {
            return new LinkShortifyService(15);
        });
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
