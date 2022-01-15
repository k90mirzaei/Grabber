<?php

namespace codefarm\Grabber;

use codefarm\Grabber\Facade\Grabber;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
        $this->registerPublishes();

        $this->registerFields();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Grabber', function () {
            return new \codefarm\Grabber\Grabber();
        });
    }

    /**
     * Register the package resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register the package publishes.
     *
     * @return void
     */
    protected function registerPublishes()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/create_posts_table.php' =>
                database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php')
        ], 'grabber-migrations');
    }

    /**
     * Register any default fields to the app.
     *
     * @return void
     */
    protected function registerFields()
    {
        Grabber::fields([
            Fields\Title::class,
            Fields\Thumbnail::class,
            Fields\Description::class,
            Fields\Content::class,
            Fields\Date::class,
        ]);
    }
}