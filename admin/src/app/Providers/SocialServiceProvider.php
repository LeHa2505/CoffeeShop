<?php

namespace App\Providers;

use App\Http\Controllers\SocialiteSettingController;
use Laravel\Socialite\Contracts\Factory;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\SocialiteServiceProvider;

class SocialServiceProvider extends SocialiteServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Factory::class, function ($app) {
            return new SocialiteSettingController($app);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
