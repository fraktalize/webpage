<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  RepositoryServiceProvider.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Providers;

use App\Contracts\PageRepositoryInterface;
use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\PageRepository;
use App\Repositories\UserOauthTokenRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserOauthTokenRepositoryInterface::class, UserOauthTokenRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
    }
}