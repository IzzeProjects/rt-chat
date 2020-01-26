<?php

namespace App\Providers;

use App\Services\RoomService;
use Illuminate\Support\ServiceProvider;

/**
 * Провайдер для регистрации сервисов приложения
 *
 * Class ServicesRegisterProvider
 * @package App\Providers
 */
class ServicesRegisterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RoomService::class, RoomService::class);
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
