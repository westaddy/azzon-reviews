<?php
namespace Westaddy\AzzonReviews;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class AzzonReviewServiceProvider extends BaseServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
         $this->publishes([
                            __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
                            ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app['review'] = $this->app->share(function($app) {
            return new Review;
        });
    }

}
