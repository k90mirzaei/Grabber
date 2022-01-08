<?php

namespace codefarm\Grabber;

use Illuminate\Support\ServiceProvider;
use codefarm\Grabber\Facade\Grabber;

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
        $this->registerFields();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Register any bindings to the app.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->app->singleton('Grabber', function () {
            return new \codefarm\Grabber\Grabber();
        });
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
        ]);
    }
}