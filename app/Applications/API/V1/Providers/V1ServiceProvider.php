<?php


namespace V1\Providers;


use Illuminate\Support\ServiceProvider;

class V1ServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(V1RouteServiceProvider::class);
    }
}
