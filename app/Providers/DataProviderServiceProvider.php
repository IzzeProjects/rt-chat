<?php

namespace App\Providers;

use App\DataProviders\RoomDataProvider;
use App\DataProviders\UserDataProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Регистрация поставщиков данных
 *
 * Class DataProviderServiceProvider
 * @package App\Providers
 */
class DataProviderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoomDataProvider::class, RoomDataProvider::class);
        $this->app->bind(UserDataProvider::class, UserDataProvider::class);
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
