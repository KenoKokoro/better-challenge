<?php


namespace App\Modules;


use App\Modules\Response\Json\JsonServiceProvider;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function register(): void
    {
        $this->app->register(JsonServiceProvider::class);
    }
}
