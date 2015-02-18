<?php namespace Szykra\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('flash', function()
        {
            return $this->app->make('Szykra\Notifications\FlashNotifier');
        });
    }

    /**
     * Bootstrap a package
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../views', 'notifications');
    }

}