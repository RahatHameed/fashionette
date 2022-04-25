<?php

namespace App\Providers;

use App\Services\TvMaze\Service;
use App\Services\TvMaze\ServiceInterface;
use Illuminate\Support\ServiceProvider;

class AutoWiringServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Bind all interfaces with concrete classes
        $this->app->bind(ServiceInterface::class, Service::class);
    }
}
