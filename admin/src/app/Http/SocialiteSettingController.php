<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Laravel\Socialite\SocialiteManager;
use Laravel\Socialite\Two\FacebookProvider;

class SocialiteSettingController extends SocialiteManager
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    public function createFaceDriver()
    {
        $config = $this->config->get('services.face');

        return $this->buildProvider(FacebookProvider::class, $config);
    }
}