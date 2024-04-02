<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoryInterface;
use App\Repositories\AuthRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(\App\Interfaces\ExampleRepositoryInterface::class, \App\Repositories\ExampleRepository::class);
        $this->app->bind(\App\Interfaces\BlogTagRepositoryInterface::class, \App\Repositories\BlogTagRepository::class);
        $this->app->bind(\App\Interfaces\BlogCategoryRepositoryInterface::class, \App\Repositories\BlogCategoryRepository::class);
        $this->app->bind(\App\Interfaces\ProjectCategoryRepositoryInterface::class, \App\Repositories\ProjectCategoryRepository::class);
        $this->app->bind(\App\Interfaces\ContactRepositoryInterface::class, \App\Repositories\ContactRepository::class);
        $this->app->bind(\App\Interfaces\BannerRepositoryInterface::class, \App\Repositories\BannerRepository::class);
        $this->app->bind(\App\Interfaces\FrequentlyAskedQuestionRepositoryInterface::class, \App\Repositories\FrequentlyAskedQuestionRepository::class);
        $this->app->bind(\App\Interfaces\BlogRepositoryInterface::class, \App\Repositories\BlogRepository::class);
        $this->app->bind(\App\Interfaces\ServiceRepositoryInterface::class, \App\Repositories\ServiceRepository::class);
        $this->app->bind(\App\Interfaces\TestimonialRepositoryInterface::class, \App\Repositories\TestimonialRepository::class);
        $this->app->bind(\App\Interfaces\ProjectRepositoryInterface::class, \App\Repositories\ProjectRepository::class);
        $this->app->bind(\App\Interfaces\ClientRepositoryInterface::class, \App\Repositories\ClientRepository::class);
        $this->app->bind(\App\Interfaces\WebConfigurationRepositoryInterface::class, \App\Repositories\WebConfigurationRepository::class);
        $this->app->bind(\App\Interfaces\CustomerServiceRepositoryInterface::class, \App\Repositories\CustomerServiceRepository::class);
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
